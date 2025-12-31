<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\SomethingController;
use App\Http\Controllers\UserController;
use App\Models\DbTable;
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

Route::middleware("auth")->group(function () {
    Route::get('/', function () {
        return view('layout');
    });
    Route::get('/home', function () {
        return view('layout');
    });
    Route::get('/profile', function () {
        return view('profile');
    });
    Route::get('/user', [UserController::class, 'index'])->name('user.user');
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user', [UserController::class, 'store'])->name('user.store');
    Route::get('/user/{user}/create', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/{user}/update', [UserController::class, 'update'])->name('user.update');
    Route::delete('/user/{user}/delete', [UserController::class, 'destroy'])->name('user.destroy');
    Route::get('/something', function () {
        $users = DbTable::all();
        return view('user.something', ['usersNameMail' => $users]);
    })->name('something');
    Route::get('/something/upload', function () {
        return view('user.something');
    });
    Route::post('/something/upload', [SomethingController::class, 'fileUpload'])->name('something.upload');
});


Route::get('/login', [AuthController::class, 'openLogin'])->name('login');
Route::post('/login/user', [AuthController::class, 'userLogin'])->name('login.post');
Route::get('/register', [AuthController::class, 'openRegister'])->name('register');
Route::post('/register/user', [AuthController::class, 'userRegister'])->name('register.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');



