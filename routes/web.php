<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/conversation/', 'ConversationController@index')->name('conversation');
Route::get('/conversation/{user}', 'ConversationController@show')
    ->middleware('can:talkTo,user')
    ->name('conversation.show');
Route::post('/conversation/{user}', 'ConversationController@store')->middleware('can:talkTo,user');
Route::get('/addFriend', 'AddFriendController@index')->name('addfriend');
Route::post('/addFriend', 'AddFriendController@search');
// Invitation routes
Route::get('/invitations', 'InvitationController@list')->middleware('auth')->name('invitations');
Route::post('/invitations/send/{sender_id}', 'InvitationController@send')->middleware('auth')->name('sendInvitation');
Route::post('/invitations/accept/{id}', 'InvitationController@accept')->middleware('auth')->name('acceptInvitation');
Route::post('/invitations/decline/{id}', 'InvitationController@decline')->middleware('auth')->name('declineInvitation');

Route::get('my-captcha', 'CaptchaController@myCaptcha')->name('myCaptcha');
Route::post('my-captcha', 'CaptchaController@myCaptchaPost')->name('myCaptcha.post');

Route::get('/profile', 'ProfileController@profile');
Route::get('/post', 'PostController@post');
Route::get('/category', 'CategoryController@category');
Route::post('/addCategory', 'CategoryController@addCategory');
Route::get('/category/delete/{id_category}','CategoryController@delete');
Route::post('addProfile','ProfileController@addProfile');