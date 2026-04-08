<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;


Route::get('/',[StudentController::class,'showStudent']);

Route::get('/union',[StudentController::class,'uniondata']);

Route::get('/when',[StudentController::class,'whendata']);

Route::get('/chunk',[StudentController::class,'chunkdata']);

///user Raw Sql Queries
Route::get('/raw',[StudentController::class,'rawStudents']);

Route::view('/user','/addUser');
Route::post('/add',[StudentController::class,'addUser'])->name('addUser');

///Customer Rule of validation
Route::view('/custom','/addUserval');
Route::post('/customform',[StudentController::class,'addUserval'])->name('addUserval');

//Cloure Method
Route::view('/closure','/addUserCl');
Route::post('/clouserform',[StudentController::class,'addUserval'])->name('addUserCl');