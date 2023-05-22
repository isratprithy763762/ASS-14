<?php

use App\Http\Controllers\API\V1\StudentController;
use App\Http\Controllers\API\V1\SubmitController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::controller(StudentController::class)->group(function () {
    Route::get('/students', 'index');
    Route::get('/students/{id}', 'singleIndex')->whereNumber('id');
    Route::get('/students/{id}/{field}', 'field')->whereNumber('id')->whereIn('field', ['id', 'name', 'age']);
    Route::get('/students/cookie', 'setCookie');

    Route::post('/students', 'create');
});

Route::controller(SubmitController::class)->group(function () {
    Route::post('/submit', 'create');
});