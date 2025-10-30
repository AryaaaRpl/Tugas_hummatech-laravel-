<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

Route::get('/students/create', [StudentController::class, 'create'])->name('siswa.create');
Route::post('/students', [StudentController::class, 'massAssignment'])->name('siswa.massAssignment');
