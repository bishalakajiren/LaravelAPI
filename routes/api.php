<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestAPIController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;


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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});





Route::group(['middleware'=>'auth:api'],function (){
    
    Route::apiResource("post", PostController::class);
    
   // Route::get('first-api',[TestAPIController::class,'firstAPI']);
    
    Route::get('/get-Students/{id?}',[StudentController::class,'getStudents']);
    
    Route::post('/add-Students', [StudentController::class,'addStudents']);
    
    Route::put('/student-update',[StudentController::class,'updateStudents']);
    
    Route::delete('/student-delete/{id}',[StudentController::class,'deleteStudents']);
    
    Route::get('/student-search/{param}',[StudentController::class,'searchStudents']);
    
    Route::post('/file-upload',[FileUploadController::class,'FileUpload']);

 

    Route::post('/register',[UserController::class,'registration']);
    
  

    Route::post('/logout',[UserController::class,'logout']);
});

// Route::post('login',[UserController::class,'login']);

// Route::post('/register',[UserController::class,'registration']);

// Route::post('/login',[UserController::class,'login']);

// Route::get('/login',[UserController::class,'login']);


//Route::middleware('auth:api')->get('/get-Students/{id?}',[StudentController::class,'getStudents']);
Route::post('/login',[UserController::class,'login']);
    
Route::get('/login',[UserController::class,'login']);