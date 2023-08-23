<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotesController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[NotesController::class, 'index'])->name('home');
Route::get('/add',[NotesController::class, 'create'])->name('create');
Route::post('/add',[NotesController::class, 'store'])->name('add');
Route::get('/view/{id}',[NotesController::class, 'show'])->name('view');
Route::post('/delete',[NotesController::class, 'destroy'])->name('delete');
Route::get('/edit/{id}',[NotesController::class, 'edit'])->name('edit');
Route::post('/update',[NotesController::class, 'update'])->name('update');
