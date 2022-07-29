<?php

use App\Http\Controllers\CollectionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegController;
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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/reg',[RegController::class,'register'])->name('reg');
Route::get('/manage',[RegController::class,'manage'])->name('manage');
Route::get('/weeklyreport',[RegController::class,'weeklyreport'])->name('weeklyreport');
Route::get('edit/{id}',[RegController::class,'edit'])->name('edit');

Route::post('registration',[RegController::class,'store'])->name('registration.post');
Route::post('/update/{id}',[RegController::class,'update']);
Route::post('deleteUser/{id}',[RegController::class,'deleteUser'])->name('deleteUser');
Route::get('generatereport/{id}',[RegController::class,'generatereport'])->name('generatereport');


// ----------USER----------
Route::get('collection',[CollectionController::class,'collection'])->name('collection');
Route::post('/collect',[CollectionController::class,'store']);
Route::get('/viewreport',[CollectionController::class,'viewreport'])->name('viewreport');
Route::get('/customerdetails',[CollectionController::class,'customerdetails'])->name('customerdetails');

