<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MedicalController;
use App\Http\Controllers\PersonalDateController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login']);
Route::post('/register', [\App\Http\Controllers\AuthController::class, 'register']);
Route::group( ['middleware' => 'jwt.auth'], function () {

    Route::post('/logout', [\App\Http\Controllers\AuthController::class, 'logout']);
    Route::get('/user-profile', [\App\Http\Controllers\AuthController::class, 'userProfile']);

    //Route::post('/update/{user}', [\App\Http\Controllers\AuthController::class, 'update']);

    Route::post('update-profile',[AuthController::class,'update_profile']);



    Route::get('/getFemale', [\App\Http\Controllers\UserController::class, 'getFemale']);
    Route::get('/getMale', [\App\Http\Controllers\UserController::class, 'getMale']);
    Route::get('/getLastWeek', [\App\Http\Controllers\UserController::class, 'getLastWeek']);
    Route::get('/users/{user}', [\App\Http\Controllers\UserController::class, 'show']);
    Route::post('/users/{user}', [\App\Http\Controllers\UserController::class, 'update']);
    Route::get('/getNationalityPercentage', [\App\Http\Controllers\UserController::class, 'getNationalityPercentage']);
    Route::post('/getRate', [\App\Http\Controllers\UserController::class, 'getRate']);


    Route::get('/personals',[PersonalDateController::class, 'index']);
    Route::post('/personals',[PersonalDateController::class, 'store']);
    Route::patch('/personals/{data}',[PersonalDateController::class, 'update']);
    Route::get('/personals/{data}',[PersonalDateController::class, 'show']);
    Route::delete('/personals/{data}',[PersonalDateController::class, 'delete']);

    Route::get('/medicals',[MedicalController::class, 'index']);
    Route::post('/medicals',[MedicalController::class, 'store']);
    Route::post('/medical',[MedicalController::class, 'update']);
    Route::get('/medicals/{data}',[MedicalController::class, 'show']);
    Route::delete('/medicals/{data}',[MedicalController::class, 'delete']);

    //// Clinic
        Route::get('/clinic',[\App\Http\Controllers\ClinicController::class, 'index']);
    Route::post('/clinic',[\App\Http\Controllers\ClinicController::class, 'store']);
});

