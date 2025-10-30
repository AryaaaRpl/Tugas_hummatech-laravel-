<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

Route::get('/students/create', [StudentController::class, 'create'])->name('siswa.create');
Route::post('/students', [StudentController::class, 'massAssignment'])->name('siswa.massAssignment');


// menampilkan form edit (GET)
Route::get('/students/{id}/edit', [StudentController::class, 'edit'])->name('siswa.edit');

// mengupdate data (PUT)
Route::put('/students/{id}', [StudentController::class, 'massUpdate'])->name('siswa.massUpdate');

