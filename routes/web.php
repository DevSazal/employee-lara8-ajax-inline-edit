<?php

use Illuminate\Support\Facades\Route;

// Add Controller Directory
use App\Http\Controllers\Dev;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[Dev\DefaultController::class, 'index'])->name('home');
Route::post('/pagination-fetch',[Dev\DefaultController::class, 'ajaxPaginateFetch'])->name('pagination.fetch');
Route::post('/salary-update',[Dev\DefaultController::class, 'salaryUpdate'])->name('update.salary');
Route::post('/name-update',[Dev\DefaultController::class, 'nameUpdate'])->name('update.name');
Route::post('/all-update',[Dev\DefaultController::class, 'allUpdate'])->name('update.all');
