<?php

use App\Http\Controllers\BalanceController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ElectricTokenController;
use App\Models\ElectricToken;
use Illuminate\Http\Request;
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

Route::get('/', [Controller::class, 'tokenIndex']);

Route::get('/about', function () {
    return view('master', ['subview' => 'about']);
});

// Route::post('/add', function(Request $request) {
//     return response($request);
// });

Route::post('/add', [Controller::class, 'tokenStore']);
Route::get('/edit/{id}', [Controller::class, 'tokenEdit']);
Route::delete('/del/{id}', [Controller::class, 'tokenDestroy']);
// Route::get('/del/{id}', [Controller::class, 'tokenDestroy']);

Route::put('/put/{id}', [Controller::class, 'tokenUpdate']);

Route::post('/add-balance', [Controller::class, 'balanceStore']);
Route::post('/update-balance', [Controller::class, 'balanceUpdate']);
// Route::resource('token', ElectricTokenController::class);
// Route::resource('balance', BalanceController::class);