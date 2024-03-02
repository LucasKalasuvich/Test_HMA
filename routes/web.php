<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;
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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [UsersController::class, 'viewDashboard'])->name('dashboard');
    Route::get('/master', [UsersController::class, 'index'])->name('master');
    Route::get('/tambahUsers', [UsersController::class, 'view'])->name('tambahUsers.view');
    Route::get('/editUsers/{id}', [UsersController::class, 'edit'])->name('editUsers.edit');
    Route::post('/editUsers/edit', [UsersController::class, 'create'])->name('editUsers.editUsers');
    Route::post('/tambahUsers', [UsersController::class, 'create'])->name('tambahUsers.create');
    Route::delete('/deleteUsers/{id}', [UsersController::class, 'destroy'])->name('deleteUsers.destroy');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
