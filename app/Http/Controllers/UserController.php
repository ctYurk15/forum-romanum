<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function setProfilePicture($profile_picture, $user_id)
    {
        // Find the user by ID
        $user = User::find($user_id);

        if ($user) {
            // Update the 'photo_path' column
            //$user->update(['photo_path' => $profile_picture]);
            $user->photo_path = $profile_picture;
            $user->save();

            return response()->json(['message' => 'Photo path updated successfully']);
        } else {
            return response()->json(['message' => 'User not found'], 404);
        }
    }
    
    
}
