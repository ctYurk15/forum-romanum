<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Vote;

class OtherPages extends Controller
{
    public function arcusTriumphalis()
    {
        $topRatedUsers = User::orderBy('rating', 'desc')->take(10)->get();

        return view('other/arcus-triumphalis')->with([
            'top_rating_users' => $topRatedUsers
        ]);
    }

    public function currentUserPage()
    {
        $user_info = Auth::user();

        $profiles_images = $this->getProfileImages();

        return view('other/current-user-page')->with([
            'user' => $user_info,
            'profile_images' => $profiles_images
        ]);
    }

    public function userPage(int $user_id)
    {
        $user_info = User::find($user_id);

        if(Auth::user() != null && Auth::user()->id == $user_id)
        {
            return redirect()->route('current-user-page');
        }

        $votedUser = User::find($user_id);

        // Check if the logged-in user has already voted for the user
        $userHasVoted = Vote::where('voter_id', auth()->user()->id)
            ->where('voted_user_id', $votedUser->id)
            ->exists();

        $vote = Vote::where('voter_id', auth()->user()->id)
            ->where('voted_user_id', $votedUser->id)
            ->first();


        return view('other/user-page')->with([
            'user' => $user_info,
            'current_user' => Auth::check(),
            'userHasVoted' => $userHasVoted,
            'vote' => $vote
        ]);
    }

    private function getProfileImages()
    {
        // Define elements to exclude
        $excludeElements = ['.', '..', 'no_profile.png'];

        $rootPath = base_path();
        $raw_array = scandir($rootPath . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'img' . DIRECTORY_SEPARATOR . 'profile-pictures');

        // Use array_diff to filter out unwanted elements
        $filteredArray = array_values(array_diff($raw_array, $excludeElements));

        return $filteredArray;
    }

    public function updateRating($votedUserId, $action)
    {
        $voterId = Auth::user()->id;

        // Check if the voter has already voted for the user
        $existingVote = Vote::where('voter_id', $voterId)
            ->where('voted_user_id', $votedUserId)
            ->first();

        if ($existingVote) {
            return response()->json(['error' => 'User has already been voted by this voter'], 400);
        }

        // Update the rating and record the vote with vote type
        $votedUser = User::find($votedUserId);

        if (!$votedUser) {
            return response()->json(['error' => 'Voted user not found'], 404);
        }

        if ($action === 'increment') {
            $votedUser->increment('rating');
            $voteType = 'upvote';
        } elseif ($action === 'decrement') {
            $votedUser->decrement('rating');
            $voteType = 'downvote';
        } else {
            return response()->json(['error' => 'Invalid action'], 400);
        }

        // Save the vote record with vote type
        $vote = new Vote([
            'voter_id' => $voterId,
            'voted_user_id' => $votedUserId,
            'vote_type' => $voteType,
        ]);
        $vote->save();

        return response()->json(['success' => 'Rating updated successfully']);
    }

    public function removeVote($votedUserId)
    {
        $votedUser = User::find($votedUserId);

        if (!$votedUser) {
            abort(404);
        }

        // Find and delete the vote record
        $vote = Vote::where('voter_id', auth()->user()->id)
            ->where('voted_user_id', $votedUser->id)
            ->first();

        if ($vote) {
            // Update the rating based on the vote type before deleting the vote
            if ($vote->vote_type === 'upvote') {
                $votedUser->decrement('rating');
            } elseif ($vote->vote_type === 'downvote') {
                $votedUser->increment('rating');
            }

            $vote->delete();
        }

        return redirect()->back()->with('success', 'Vote removed successfully');
    }
    
    
}
