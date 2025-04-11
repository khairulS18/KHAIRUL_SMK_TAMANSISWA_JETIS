<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Models\User;
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

Route::prefix('/dashboard')->group(function () {
    Route::get('/', function () {
        return view('administrator-portal.index');
    });

    // Route List Administrations
    Route::get('/list-administration', function () {
        
    });

    // Route List User
    Route::get('/list-user', function () {
        $data = User::paginate(10);
        
        return view('administrator-portal.users')->with(["users" => $data]);
    })->name('admin.user');
    Route::get('/list-user/form', [UserController::class, 'create'])->name('admin.user.form');
    Route::post('/list-user/form/store', [UserController::class, 'store'])->name('admin.user.form.store');
    Route::get('/list-user/edit/{id}', [UserController::class, 'edit'])->name('admin.user.edit');
    Route::put('/list-user/edit/update/{id}', [UserController::class, 'update'])->name('admin.user.edit.update');
    Route::delete('/list-user/delete/{id}', [UserController::class, 'destroy'])->name('admin.user.destroy');
});

// Route::get('/dashboard', function () {
//     return view('template-gui.administrator-portal.index');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
