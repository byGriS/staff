<?php

use App\Http\Controllers\AppController;
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

Route::get('/', 'AppController@index')->middleware('auth');

Route::resource('employee', 'EmployeeController')->only(['show', 'edit', 'create'])->middleware('auth');

Route::get('/test', 'AppController@test');

Auth::routes();

