<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginAuthController;
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

Route::get('/login',[LoginAuthController::class,'login'])->middleware('alreadyLoggedIn');
Route::get('/registration',[LoginAuthController::class,'registration']);
Route::post('/register-user',[LoginAuthController::class,'registerUser'])->name('register-user');
Route::post('login-user',[LoginAuthController::class,'loginUser'])->name('login-user');
Route::get('/dashboard',[LoginAuthController::class,'dashboard'])->middleware('isLoggedIn');
Route::get('/logout',[LoginAuthController::class,'logout']);