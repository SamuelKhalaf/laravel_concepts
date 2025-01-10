<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Mail\TestEmail;
use Illuminate\Support\Facades\Mail;

Route::get('/send-test-email', function () {
    Mail::to('recipient@example.com')->send(new TestEmail());
    return 'Test email sent successfully!';
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/landing', function () {
    return view('landing');
});

Route::get('/about', function () {
    return view('about');
});

Route::group( ['namespace' => 'App\Http\Controllers\Frontend', 'prefix' => 'Frontend'], function () {
    Route::get('users','UserController@userName')->middleware('auth');
    Route::get('users1','UserController@userName1');
    Route::get('users2','UserController@userName2');
});

Route::get('login',function (){
    return ' You must login to access this page';
})->name('login');

Auth::routes(['verify'=>'true']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');

