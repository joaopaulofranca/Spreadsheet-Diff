<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'App\Http\Controllers\UsersImportController@index');
Route::post('/import', 'App\Http\Controllers\UsersImportController@store');
Route::post('/compare', 'App\Http\Controllers\UsersImportController@compare');
Route::get('/relatorio', 'App\Http\Controllers\UsersImportController@relatorio');
Route::delete('/remove/{data}', 'App\Http\Controllers\UsersImportController@destroy');