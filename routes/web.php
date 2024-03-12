<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register',\App\Livewire\Register::class);
Route::get('/login',\App\Livewire\Login::class);

Route::middleware(['isUser'])->group(function () {
    Route::get('/dashboard',\App\Livewire\Dashboard::class);
});
