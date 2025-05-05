<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\StudentController;

// Home Route
Route::get('/', function () {
    return view('welcome');
});

// Authenticated users
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        $role = auth()->user()->role;
        return redirect("/{$role}/dashboard");
    })->name('dashboard');
});

// Admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index']);
    Route::resource('/admin/students', StudentController::class);

});

// Instructor
Route::middleware(['auth', 'role:instructor'])->group(function () {
    Route::get('/instructor/dashboard', [InstructorController::class, 'index']);
});

// Student
Route::middleware(['auth', 'role:student'])->group(function () {
    Route::get('/student/dashboard', [StudentController::class, 'index']);
});

Route::middleware(['web'])->group(function () {
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
});

require __DIR__.'/auth.php';
