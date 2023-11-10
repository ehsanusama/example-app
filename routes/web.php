<?php

use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::get('/admin', function () {
//     return view('admin.index');
// })->middleware(['auth', 'role:admin'])->name('admin.index');

Route::middleware(['auth', 'role:admin'])->name('admin.')->prefix('admin')->group(function () {
    Route::get('/', function () {
        return view('admin.index');
    })->name('index');
    Route::get('/role', [RoleController::class, 'index'])->name('role');
    Route::post('/role', [RoleController::class, 'create']);
    Route::get('/role/edit/{id}', [RoleController::class, 'edit']);
    Route::post('/role/edit/{id}', [RoleController::class, 'update']);
    Route::get('/role/delete/{id}', [RoleController::class, 'destroy']);
    Route::get('/expense', [ExpenseController::class, 'index'])->name('expense');
    Route::post('/expense', [ExpenseController::class, 'store']);
    Route::resource('/permission', PermissionsController::class);
});
require __DIR__ . '/auth.php';
