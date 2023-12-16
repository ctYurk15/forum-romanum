<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Models\Poll;
use App\Models\PollOption;
use App\Models\UserPollSelection;

class Suffragium extends Controller
{
    public function all()
    {
        $perPage = 10; // Number of polls per page
        $page = request()->query('page', 1); // Get the 'page' parameter from the URL, default to 1 if not present
        $search = request()->input('name'); // Get the 'search' parameter from the URL

        $query = Poll::query();

        // Apply search filter if a search query is provided
        if ($search) {
            $query->where('poll_name', 'like', '%' . $search . '%');
        }

        $polls = $query->paginate($perPage, ['*'], 'page', $page);

        return view('suffragium/all', ['polls' => $polls]);
    }

    public function single(int $suffragium_id)
    {
        // Find the poll by ID
        $poll = Poll::findOrFail($suffragium_id);

        // Check if the current user has made a selection for this poll
        $user = auth()->user();
        // Check if the user has made any selections for this poll
        $userHasVoted = $user ? $user->userPollSelections->contains('poll_id', $suffragium_id) : false;

        // Load all options for the poll with their vote counts
        $optionsWithVoteCounts = PollOption::where('poll_id', $suffragium_id)->get()
            ->map(function ($option) use ($user, $userHasVoted) {
                // Check if the user has voted for any option in this poll
                $option->userHasVoted = $userHasVoted;

                // If the user has voted, get the vote count
                $option->voteCount = $userHasVoted ? $option->userPollSelections->count() : null;

                return $option;
            });

        return view('suffragium/single')->with([
            'name' => 'Vote 1',
            'id' => $suffragium_id,
            'poll' => $poll,
            'optionsWithVoteCounts' => $optionsWithVoteCounts,
            'current_user' => Auth::check(),
        ]);
    }

    public function vote(Request $request)
    {
        $user = auth()->user();
        $optionId = $request->input('optionId');
        $pollOption = PollOption::find($optionId);

        // Check if the user has already voted for this option
        $existingVote = UserPollSelection::where('user_id', $user->id)
            ->where('poll_option_id', $optionId)
            ->first();

        if (!$existingVote) {
            // If the user hasn't voted for this option, create a new vote
            UserPollSelection::create([
                'user_id' => $user->id,
                'poll_id' => $pollOption->poll_id, // Store the poll_id
                'poll_option_id' => $optionId,
                // Add other fields as needed
            ]);

            // You might want to update the vote count here and send it back in the response
            $voteCount = UserPollSelection::where('poll_option_id', $optionId)->count();

            return response()->json(['success' => true, 'voteCount' => $voteCount]);
        }

        // If the user has already voted for this option, return an error response
        return response()->json(['success' => false, 'message' => 'User has already voted for this option']);
    }

    public function new()
    {
        return view('suffragium/new');
    }
}
