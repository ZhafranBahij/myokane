<?php

use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\Income\IncomeCreate;
use App\Livewire\Admin\Income\IncomeEdit;
use App\Livewire\Admin\Income\IncomeIndex;
use App\Livewire\Admin\Outcome\OutcomeCreate;
use App\Livewire\Admin\Outcome\OutcomeEdit;
use App\Livewire\Admin\Outcome\OutcomeIndex;
use App\Livewire\Admin\User\UserCreate;
use App\Livewire\Admin\User\UserEdit;
use App\Livewire\Admin\User\UserIndex;
use App\Livewire\User\ProfileEdit;
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

Route::middleware(['auth'])->group(function () {
    Route::get('/home', Dashboard::class)->name('home');

    Route::name('users.')->prefix('/users')->group(function () {
        Route::get('/', UserIndex::class)->name('index');
        Route::get('/create', UserCreate::class)->name('create');
        Route::get('/{user}/edit', UserEdit::class)->name('edit');
        Route::get('/profile', ProfileEdit::class)->name('profile');
    });

    Route::name('incomes.')->prefix('/incomes')->group(function () {
        Route::get('/', IncomeIndex::class)->name('index');
        Route::get('/create', IncomeCreate::class)->name('create');
        Route::get('/{income}/edit', IncomeEdit::class)->name('edit');
    });

    Route::name('outcomes.')->prefix('/outcomes')->group(function () {
        Route::get('/', OutcomeIndex::class)->name('index');
        Route::get('/create', OutcomeCreate::class)->name('create');
        Route::get('/{outcome}/edit', OutcomeEdit::class)->name('edit');
    });
});
