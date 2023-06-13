<?php

use App\Http\Controllers\CustomReportController;
use App\Utilities\Generator;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware ref. Make something great!
|
*/

Route::get('/', [CustomReportController::class, 'generate']);
Route::get('/sample', [CustomReportController::class, 'sample']);
