<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminDashboardController;

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

Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('/login_process', [AuthController::class, 'authenticate'])->name('login_process');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');



Route::get('/dashboard/students', [AdminDashboardController::class, 'index_students'])->name('students');
Route::get('/dashboard/students/create', [AdminDashboardController::class, 'create_student'])->name('create_student');
Route::post('/dashboard/students', [AdminDashboardController::class, 'store_student'])->name('store_student');
Route::get('/dashboard/students/{student}/edit', [AdminDashboardController::class, 'edit_student'])->name('edit_student');
Route::put('dashboard/students/{student}', [AdminDashboardController::class, 'update_student'])->name('update_student');
Route::delete('/dashboard/students/{student}', [AdminDashboardController::class, 'destroy_student'])->name('destroy_student');

Route::get('/dashboard/groups', [AdminDashboardController::class, 'index_groups'])->name('groups');
Route::get('dashboard/groups/{id}/students', [AdminDashboardController::class, 'showStudents'])->name('showStudents');
Route::delete('/dashboard/groups/{group}', [AdminDashboardController::class, 'destroy_group'])->name('destroy_group');

Route::get('/dashboard/schedules', [AdminDashboardController::class, 'index_schedules'])->name('schedules');
Route::get('/dashboard/schedules/create', [AdminDashboardController::class, 'create_schedule'])->name('create_schedule');
Route::post('/dashboard/schedules', [AdminDashboardController::class, 'store_schedule'])->name('store_schedule');
Route::get('/dashboard/schedules/{schedule}/edit', [AdminDashboardController::class, 'edit_schedule'])->name('edit_schedule');
Route::put('dashboard/schedules/{schedule}', [AdminDashboardController::class, 'update_schedule'])->name('update_schedule');

Route::get('/dashboard/users', [AdminDashboardController::class, 'index_users'])->name('users');
