<?php


use App\Http\Controllers\Api\StudentController;
use App\Http\Controllers\Api\AbsenController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('', [StudentController::class, 'index']);
Route::resources([
    'student' => StudentController::class,
    'absen' => AbsenController::class,
]);