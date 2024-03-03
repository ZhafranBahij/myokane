<?php

use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\User\UserCreate;
use App\Livewire\Admin\User\UserEdit;
use App\Livewire\Admin\User\UserIndex;
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

Auth::routes();

Route::get('/home', Dashboard::class)->name('home');

Route::get('/users', UserIndex::class)->name('users');
Route::get('/users/create', UserCreate::class)->name('users.create');
Route::get('/users/{user}/edit', UserEdit::class)->name('users.edit');
