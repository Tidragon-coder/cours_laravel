<?php
 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
 
Route::get('/', function () {
    return view('home');
})->name('home');
 
// Authentication routes
Route::get('/login', [UserController::class, 'showLogin'])->name('login');
Route::post('/login', [UserController::class, 'login'])->name('login.submit');
Route::get('/register', [UserController::class, 'showRegister'])->name('register');
Route::post('/register', [UserController::class, 'register'])->name('register.submit');
Route::post('/profile/upload', [UserController::class, 'uploadProfilePicture'])->name('profile.upload');
 
// Protected routes
Route::middleware('auth')->group(function() {
    Route::get('/profile/edit', [UserController::class, 'edit'])->name('auth.edit');
    Route::post('/profile/edit', [UserController::class, 'profileupdate'])->name('auth.update');
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
    Route::get('/logout', [UserController::class, 'webLogout'])->name('logout');

   //Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
    Route::get('/posts/create', [PostController::class, 'showcreate'])->name('posts.create'); // Page du formulaire
    Route::post('/posts', [PostController::class, 'create'])->name('posts.store'); // Envoi du formulaire

    Route::get('/posts-feed', [PostController::class, 'index'])->name('posts.index');


});
