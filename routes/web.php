<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\NameController;
use App\Http\Controllers\UserController;
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

Route::get('/names/{order}', [NameController::class, 'get'])->name('names.get');
Route::post('/names', [NameController::class, 'post'])->name('names.post');
Route::patch('/names/{id}', [NameController::class, 'patch'])->name('names.patch');
Route::delete('/names/{id}', [NameController::class, 'delete'])->name('names.delete');

Route::get('/login', [MainController::class, 'login'])->name('login.route');
Route::get('/signup', [MainController::class, 'signup'])->name('signup.route');
Route::get('/edit/{id}', [MainController::class, 'edit'])->name('edit.route');

Route::post('/user/auth', [UserController::class, 'auth'])->name('auth.route');
Route::post('/user/create', [UserController::class, 'create'])->name('create.route');
Route::get('/user/logout', [UserController::class, 'logout'])->name('logout.route');

Route::get('/profile');

Route::get('/', [MainController::class, 'index'])->name('index.route');
