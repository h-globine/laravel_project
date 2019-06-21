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

Route::post('/captcha', function() {
       if (request()->getMethod() == 'POST') {
           $rules = ['captcha' => 'required|captcha'];
           $validator = validator()->make(request()->all(), $rules);
           if ($validator->fails()) {
               echo '<p style="color: #ff0000;">Incorrect!</p>';
           } else {
               echo '<p style="color: #00ff30;">Matched :)</p>';
           }
       }

       $form = '<form method="post" action="captcha-test">';
       $form .= '<input type="hidden" name="_token" value="' . csrf_token() . '">';
       $form .= '<p>' . captcha_img() . '</p>';
       $form .= '<p><input type="text" name="captcha"></p>';
       $form .= '<p><button type="submit" name="check">Check</button></p>';
       $form .= '</form>';
       return $form;
   });
