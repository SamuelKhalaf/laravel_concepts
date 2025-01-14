<?php

use App\Http\Controllers\OfferController;
use App\Http\Controllers\YoutubeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Mail\TestEmail;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SocialController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/landing', function () {
    return view('landing');
})->middleware(['auth'])->name('landing');

Route::get('/about', function () {
    return view('about');
});

Route::group( ['namespace' => 'App\Http\Controllers\Frontend', 'prefix' => 'Frontend'], function () {
    Route::get('users','UserController@userName')->middleware('auth');
    Route::get('users1','UserController@userName1');
    Route::get('users2','UserController@userName2');
});

// home route and email verification using middleware verified
Auth::routes(['verify'=>'true']);
Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('verified');

// using facebook to login
Route::get('redirect/{service}', [SocialController::class, 'redirect']);
Route::get('callback/{service}', [SocialController::class, 'callback']);

// test email
Route::get('/send-test-email', function () {
    Mail::to('recipient@example.com')->send(new TestEmail());
    return 'Test email sent successfully!';
});

// offers routes
Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]],function (){
    Route::group(['prefix' => 'offers'] , function (){
        Route::get('/', [OfferController::class,'index']);
        Route::get('create', [OfferController::class,'create']);
        Route::post('store',[OfferController::class,'store'])->name('offers.store');
    });

    //youtube
    Route::get('youtube', [YoutubeController::class,'index'])->middleware('auth');

});

