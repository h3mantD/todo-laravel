<?php

use App\Http\Controllers\AjaxController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [AjaxController::class, 'index'])->name('home.index');

Route::post('/home', [AjaxController::class, 'indexPost'])->name('home.indexPost');

Route::delete('/home', [AjaxController::class, 'todoDelete'])->name('home.todoDel');

Route::get('/home/get', [AjaxController::class, 'todoGet'])->name('home.todoGet');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
