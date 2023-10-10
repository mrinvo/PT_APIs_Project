<?php

use App\Http\Controllers\PaymentController;
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
    return view('hosted');
});

Route::get('/invoice', function () {
    return view('invoice');
});

Route::prefix('/payment')->group(function () {

    route::post('/initiate',[PaymentController::class,'initiateHosted']);
    route::post('/invoice',[PaymentController::class,'initiateInvoice']);
});
