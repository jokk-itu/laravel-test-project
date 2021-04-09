<?php

use App\Http\Controllers\InstrumentController;
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
    return view('index');
});

Route::get('instrument', [InstrumentController::class, 'index']);

Route::get('instrument/{name}', [InstrumentController::class, 'show'])
    ->where('name', '[\D]+');

Route::post('instrument/create', [InstrumentController::class, 'store']);
