<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthUserController as Auth;
use App\Http\Controllers\API\ListController;

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

Route::prefix('v1')->group(function(){
    Route::post('register',[Auth::class,"register"]);
    Route::get('job',[ListController::class,"job"]);
    Route::get('disabilty',[ListController::class,'disability']);
});
