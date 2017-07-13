<?php


use App\User;
use App\Match;

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

Route::get('/', 'Auth\LoginController@checkLogin');


//login
Route::get('/login', 'Auth\LoginController@showFormLogin')->name('login');
Route::post('/login', 'Auth\LoginController@postLogin')->name('post_login');


//register
Route::get('/register', 'Auth\RegisterController@showFormRegister')->name('register');
Route::post('/register', 'Auth\RegisterController@postRegister');


//Admin
Route::group(['prefix' => 'admin', 'middleware' => 'is_admin'], function () {
    
    Route::get('/', 'Admin\BettingController@showDashboard')->name('admin');

    Route::resource('betting', 'Admin\BettingController');

    Route::get('betting/score/{id}' , 'Admin\BettingController@updateScore')->name('update.score');

    Route::get('betting/detail/{id}' , 'Admin\BettingController@showDetail')->name('betting.detail');

    //logout
    Route::get('/logout', 'Auth\LoginController@logout')->name('ad_logout');
   
});


//User
Route::group(['prefix' => '/', 'middleware' => 'is_user'], function () {
    
    Route::get('/', 'User\UserController@index')->name('user');

    Route::get('/history/{id}','User\UserController@historyBetOfUser')->name('history');
    Route::get('/setting','User\UserController@updateAccountUser')->name('update_account');

    Route::get('/detail/{id}', 'User\UserController@showDetail')->name('user.detail');
    
    // Route::get('/betting/{id}', 'User\UserController@showBetting')->name('user.betting');

    Route::resource('bet', 'User\UserBettingController');
    
    //logout
    Route::get('/logout', 'Auth\LoginController@logout')->name('user_logout');
   
});


// Route::get('/match/{id}/user', function($id){

//     $match = Match::find($id);

//     if ($match) {

//         foreach ($match->users as $user) {
            
//            echo  $user->email;
             
//         }

//     } else {

//         dd('Match not exits');

//     }

// });



// Route::get('/xxx', 'Admin\BettingController@B');

