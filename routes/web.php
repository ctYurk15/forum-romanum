<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', '\App\Http\Controllers\MainPage@index')->name('home');
Route::get('/arcus-triumphalis', '\App\Http\Controllers\OtherPages@arcusTriumphalis')->name('arcus-triumphalis');
Route::get('/current-user-page', '\App\Http\Controllers\OtherPages@currentUserPage')
    ->middleware(['auth'])
    ->name('current-user-page');
Route::get('/user-page/{user_id}', '\App\Http\Controllers\OtherPages@userPage')->name('user-page');
Route::patch('/users/{userId}/update-rating/{action}', '\App\Http\Controllers\OtherPages@updateRating')->name('update-rating');
Route::delete('/users/{votedUserId}/remove-vote', '\App\Http\Controllers\OtherPages@removeVote')->name('remove-vote');


Route::get('/login-page', '\App\Http\Controllers\Auth@loginPage')->name('login-page');
Route::get('/register-page', '\App\Http\Controllers\Auth@registerPage')->name('register-page');

Route::get('/symposium', '\App\Http\Controllers\Symposium@all')->name('all-symposiums');
Route::get('/symposium/new', '\App\Http\Controllers\Symposium@new')->name('symposium-new')->middleware(['auth']);
Route::get('/symposium/{symposium_id}', '\App\Http\Controllers\Symposium@single')->name('symposium');
Route::post('/symposium-save', '\App\Http\Controllers\Symposium@save')->name('symposium-save');
Route::post('/message-save', '\App\Http\Controllers\Symposium@saveMessage')->name('messages-save');

Route::get('/suffragium', '\App\Http\Controllers\Suffragium@all')->name('all-suffragiums');
Route::get('/suffragium/new', '\App\Http\Controllers\Suffragium@new')->name('suffragium-new')->middleware(['auth']);
Route::get('/suffragium/{suffragium_id}', '\App\Http\Controllers\Suffragium@single')->name('suffragium');
Route::post('/vote', '\App\Http\Controllers\Suffragium@vote')->name('vote');
Route::post('/create-poll', '\App\Http\Controllers\Suffragium@createPoll')->name('createPoll');

Route::get('/adminka', '\App\Http\Controllers\Adminka@main')->name('adminka')->middleware(['auth']);
Route::delete('/admin/delete-record/{recordType}/{recordId}', '\App\Http\Controllers\Adminka@deleteRecord')
    ->name('admin.deleteRecord');
Route::post('/admin/make-admin/{userId}', '\App\Http\Controllers\Adminka@makeAdmin')->name('admin.makeAdmin');


//ajax
Route::post('/set-profile-picture/{picture_path}/{user_id}', '\App\Http\Controllers\UserController@setProfilePicture')->name('set-profile-picture');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
