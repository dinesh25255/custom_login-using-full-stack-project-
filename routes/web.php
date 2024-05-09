<?php

use Illuminate\Support\Facades\Route;
use App\Http\controllers\AuthManager;
use App\Http\Controllers\AuthController;

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
    return view( 'welcome');
})->name('home');

Route::get('/login', [AuthManager::class, 'login'])->name('login');
Route::post('/login-post', [AuthManager::class, 'loginpost'])->name('login.post');


Route::get('/registration',[AuthManager::class, 'registration'])->name('registration');
Route::post('/registration-post', [AuthManager::class, 'registrationpost'])->name('registration.post');
Route::get('/logout',[AuthManager::class,'logout'])->name('logout');
Route::group(['middleware'=> 'auth'],function(){
    Route::get('/profile',function(){
        return "Hi";
    });
    

});


