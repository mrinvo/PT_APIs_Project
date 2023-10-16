<?php

use App\Http\Controllers\PaymentController;
use Faker\Provider\ar_EG\Payment;
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

Route::get('/error', function () {
    return view('error2');
});
Route::get('/success', function () {
    return view('success2');
});

Route::get('/invoice', function () {
    return view('invoice');
});



Route::prefix('/payment')->group(function () {

    Route::post('/return', [PaymentController::class, 'return']);
    route::post('/initiate',[PaymentController::class,'initiateHosted']);
    route::post('/invoice',[PaymentController::class,'initiateInvoice']);
});
