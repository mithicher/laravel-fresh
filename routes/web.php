<?php

use App\Http\Livewire\Roles;
use App\Http\Livewire\Users;
use App\Http\Livewire\Events;
use Illuminate\Support\Facades\Route;

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

// Welcome page
Route::get('/', function() {
	return view('welcome');
});

// Dashboard
Route::view('dashboard', 'dashboard')->middleware(['auth'])->name('dashboard');

// Users
Route::get('/users', Users\Index::class)->middleware(['auth'])->name('users');
Route::get('/users/create', Users\Create::class)->middleware(['auth'])->name('users.create');
Route::get('/users/{user}/edit', Users\Edit::class)->middleware(['auth'])->name('users.edit');

// Profile
Route::view('profile', 'profile')->middleware(['auth'])->name('profile');

// Events
Route::get('/events/create', Events\Create::class)->name('events.create');

// Roles & Permissions
Route::get('/roles', Roles\Index::class)->middleware(['auth'])->name('roles');
Route::get('/roles/{role}', Roles\Edit::class)->middleware(['auth'])->name('roles.edit');

require __DIR__.'/auth.php';
