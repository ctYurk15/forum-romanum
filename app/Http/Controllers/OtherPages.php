<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class OtherPages extends Controller
{
    public function arcusTriumphalis()
    {
        return view('other/arcus-triumphalis')->with([
            'topUsers' => [
                [
                    'name' => 'name1',
                    'rating' => '100',
                    'join_date' => '2023-10-10 12:13:14',
                    'profile_photo' => 'https://picsum.photos/200/200?random=1'
                ],
                [
                    'name' => 'name1',
                    'rating' => '100',
                    'join_date' => '2023-10-10 12:13:14',
                    'profile_photo' => 'https://picsum.photos/200/200?random=2'
                ],
                [
                    'name' => 'name1',
                    'rating' => '100',
                    'join_date' => '2023-10-10 12:13:14',
                    'profile_photo' => 'https://picsum.photos/200/200?random=3'
                ],
                [
                    'name' => 'name1',
                    'rating' => '100',
                    'join_date' => '2023-10-10 12:13:14',
                    'profile_photo' => 'https://picsum.photos/200/200?random=4'
                ],
                [
                    'name' => 'name1',
                    'rating' => '100',
                    'join_date' => '2023-10-10 12:13:14',
                    'profile_photo' => 'https://picsum.photos/200/200?random=5'
                ],
                [
                    'name' => 'name1',
                    'rating' => '100',
                    'join_date' => '2023-10-10 12:13:14',
                    'profile_photo' => 'https://picsum.photos/200/200?random=6'
                ],
                [
                    'name' => 'name1',
                    'rating' => '100',
                    'join_date' => '2023-10-10 12:13:14',
                    'profile_photo' => 'https://picsum.photos/200/200?random=7'
                ],
                [
                    'name' => 'name1',
                    'rating' => '100',
                    'join_date' => '2023-10-10 12:13:14',
                    'profile_photo' => 'https://picsum.photos/200/200?random=8'
                ],
                [
                    'name' => 'name1',
                    'rating' => '100',
                    'join_date' => '2023-10-10 12:13:14',
                    'profile_photo' => 'https://picsum.photos/200/200?random=9'
                ],
                [
                    'name' => 'name1',
                    'rating' => '100',
                    'join_date' => '2023-10-10 12:13:14',
                    'profile_photo' => 'https://picsum.photos/200/200?random=10'
                ],
            ]
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
