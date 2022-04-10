<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PatientController;
use App\Models\User;
use App\Models\Patient;
use Illuminate\Support\Facades\Hash;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/register',[AuthController::class,'register'])->name('register');
Route::post('/login',[AuthController::class,'login'])->name('login');

// Route::get('/posts',[PatientController::class,'index']);
//      Route::post('/post',[PatientController::class,'store']);
//      Route::get('/posts/{id}',[PatientController::class,'show']);
//      Route::put('/posts/{id}',[PatientController::class,'update']);
//      Route::delete('/posts/{id}',[PatientController::class,'destroy']);

    Route::middleware(['auth:sanctum'])->group(function(){
  

    

                Route::get('/posts',[PatientController::class,'index']);
                Route::post('/post',[PatientController::class,'store']);
                Route::get('/posts/{id}',[PatientController::class,'show']);
                Route::put('/posts/{id}',[PatientController::class,'update']);
                Route::delete('/posts/{id}',[PatientController::class,'destroy']);

                Route::post('/logout',[AuthController::class,'logout']);
    });

    Route::group(['middleware'=>'jwt.verify'],function(){
    Route::get('user','AuthController@getUser');
    Route::get('/posts','PatientController@index');
                Route::post('/post','PatientController@store');
                Route::get('/posts/{id}','PatientController@show');
                Route::put('/posts/{id}','PatientController@update');
                Route::delete('/posts/{id}','PatientController@destroy');

                Route::post('/logout','PatientController@logout');
});