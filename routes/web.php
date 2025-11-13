<?php

use App\Http\Controllers\MajorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

Route::get('/students/create', [StudentController::class, 'create'])->name('siswa.create');
Route::post('/students', [StudentController::class, 'massAssignment'])->name('siswa.massAssignment');


// menampilkan form edit (GET)
Route::get('/students/{id}/edit', [StudentController::class, 'edit'])->name('siswa.edit');

// mengupdate data (PUT)
Route::put('/students/{id}', [StudentController::class, 'massUpdate'])->name('siswa.massUpdate');


Route::get('/student/delete', [StudentController::class, 'delete']);
Route::get('/student/destroy', [StudentController::class, 'destroy']);
Route::get('/student/massdelete', [StudentController::class, 'massdelete']);

Route::get('/students/major/create', [MajorController::class, 'create'])->name('major.create');
Route::post('/students/major', [MajorController::class, 'massAssignment'])->name('major.massAssignment');


// menampilkan form edit (GET)
Route::get('/students/major/{id}/edit', [MajorController::class, 'edit'])->name('major.edit');

// mengupdate data (PUT)
Route::put('/students/major/{id}', [MajorController::class, 'massUpdate'])->name('major.massUpdate');

Route::put('/major/{id}', [MajorController::class, 'massUpdate'])->name('major.massUpdate');


Route::delete('/major/{id}', [MajorController::class, 'delete'])->name('major.delete');
Route::put('/student/major/destroy', [MajorController::class, 'destroy']);
// Route::get('/student/major/massdelete', [MajorController::class, 'massdelete'])->name('major.massDelete');
Route::get('/major', [MajorController::class, 'index'])->name('major.index');
