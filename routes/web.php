<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\UserController;

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

Auth::routes(['register' => false]);

Route::get('/', function() {
    return view('index');
})->name('index');

Route::get('/todos', [UserController::class, 'getTodos'])->name('user.todos');

Route::get('/add', [TodoController::class, 'add'])->name('todo.add');
Route::get('/edit/{id}', [TodoController::class, 'edit'])->name('todo.edit');
Route::post('/create', [TodoController::class, 'createTodo'])->name('todo.create');
Route::patch('/update/{id}', [TodoController::class, 'updateTodo'])->name('todo.update');
Route::get('/finish/{id}', [TodoController::class, 'finishTodo'])->name('todo.finish');
Route::delete('/delete/{id}', [TodoController::class, 'deleteTodo'])->name('todo.delete');