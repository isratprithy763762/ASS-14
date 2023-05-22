<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\V1\StudentController;
use App\Http\Controllers\API\V1\SubmitController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function () {
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
});
