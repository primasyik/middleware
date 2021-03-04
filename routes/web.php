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

Route::get('/read/user', function () {
    $users = \App\User::all();
        return view('user', compact('users'));
});

Route::get('/user', function () {
    return view('user');
});

Route::group(['middleware' => ['auth']], function (){
    Route::get('/read/user', function (){
        $users = \App\User::all();
        return view('user', compact('users'));
    });
});

Route::get('/students', function () {
    return view('students');
})->middleware('auth');
