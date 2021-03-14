<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [TodoController::class, 'index']);
Route::get('/add', [TodoController::class, 'add']);
Route::get('/edit/{id}', [TodoController::class, 'edit']);

Route::post('/create', [TodoController::class, 'createTodo']);
Route::patch('/update/{id}', [TodoController::class, 'updateTodo']);
Route::get('/finish/{id}', [TodoController::class, 'finishTodo']);
Route::delete('/delete/{id}', [TodoController::class, 'deleteTodo']);