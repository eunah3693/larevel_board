<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Employee;
use App\Http\Controllers\Login_con;

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

Route::get('/home', [Employee::class,'home']);
Route::get('/about', [Employee::class,'xx']);
Route::get('/reg', [Employee::class,'registration']);

Route::post('/add_data', [Employee::class,'data_insert']);
Route::get('/show_data', [Employee::class,'fetch']);
Route::get('/edit/{id}', [Employee::class,'edit_data']);
Route::post('/update_data', [Employee::class,'update']);
Route::get('/delete/{id}', [Employee::class,'remove']);


Route::get('/create_account', [Login_con::class,'index']);
Route::post('/create', [Login_con::class,'create']);
Route::get('/login', [Login_con::class,'login']);
Route::post('/check', [Login_con::class,'check_user']);
Route::get('/welcome', [Login_con::class,'protect']);
Route::get('/logout', [Login_con::class,'logout']);
