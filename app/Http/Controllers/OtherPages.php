<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;

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
    
    
}
