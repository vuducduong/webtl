<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DocumentController;
use App\Models\Document;
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
Route::get('index',[DocumentController::class,'index'])->name('index');
Route::get('detail/{id}',[DocumentController::class,'show'])->name('detail');


Route::get('create',[DocumentController::class,'create'])->name('create');
Route::post('create',[DocumentController::class,'store'])->name('store');

Route::get('login',[AuthController::class,'login'])->name('login');
Route::post('login',[AuthController::class,'loginSuccess'])->name('success');
Route::get('edit/{id}',[DocumentController::class, 'edit'])->name('edit');
Route::post('update/{id}',[DocumentController::class,'update'])->name('update');
Route::get('delete/{id}',[DocumentController::class,'destroy'])->name('destroy');