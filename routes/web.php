<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Employee;
use App\Http\Controllers\Login_con;
use App\Http\Controllers\reply_con;

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

Route::get('/create_account', [Login_con::class,'index']);
Route::post('/create', [Login_con::class,'create']);
Route::get('/login', [Login_con::class,'login']);
Route::post('/check', [Login_con::class,'check_user']);


Route::group(['middleware' => ['user']], function () {
    Route::get('/reg', [Employee::class,'registration']);
    Route::post('/add_data', [Employee::class,'data_insert']);
    Route::get('/show_data', [Employee::class,'fetch']);
    Route::get('/view_detail/{id}', [Employee::class,'fetch_detail']);
    Route::get('/edit/{id}', [Employee::class,'edit_data']);
    Route::post('/update_data', [Employee::class,'update']);
    Route::get('/delete/{id}', [Employee::class,'remove']);
    Route::get('/welcome', [Login_con::class,'protect']);
    Route::get('/logout', [Login_con::class,'logout']);
    Route::get('/all', [reply_con::class,'all_data']);
    Route::any('/all_detail/{id}', [reply_con::class,'all_detail']);
    Route::any('/data_reply/{id}', [reply_con::class,'data_reply']);
    Route::any('/data_edit/{id}', [reply_con::class,'data_edit']);


});

