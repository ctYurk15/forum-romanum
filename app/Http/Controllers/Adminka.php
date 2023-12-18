<?php

namespace App\Http\Controllers;
use App\Models\Room;
use App\Models\Poll;
use App\Models\User;

use Illuminate\Support\Facades\Auth;

class Adminka extends Controller
{
    public function main()
    {
        if(Auth::user() != null && Auth::user()->is_admin != true)
        {
            return redirect()->route('current-user-page');
        }

        $rooms = Room::all();
        $polls = Poll::all();
        $users = User::all();

        return view('other/adminka', [
            'rooms' => $rooms,
            'polls' => $polls,
            'users' => $users,
        ]);
    }

    public function deleteRecord($recordType, $recordId)
    {
        switch($recordType)
        {
            case 'room':
                Room::destroy($recordId);
                break;
            case 'poll':
                Poll::destroy($recordId);
                break;
            case 'user':
                User::destroy($recordId);
                break;
        }

        return response()->json(['success' => true]);
    }

    public function makeAdmin($userId)
    {
        // Find the user by ID
        $user = User::find($userId);

        if ($user) {
            // Set the 'is_admin' column to true
            $user->is_admin = true;
            $user->save();
            
            return response()->json(['success' => true]);
        } else {
            return response()->json(['error' => 'User not found'], 404);
        }
    }
}
