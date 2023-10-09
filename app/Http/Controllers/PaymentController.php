<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidateInitialRequest;
use App\Services\PaymentService;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Exists;

class PaymentController extends Controller
{
    //
    protected $paymentService;

    public function __construct(PaymentService $paymentService)
    {
        $this->paymentService = $paymentService;
    }

    public function initiate(ValidateInitialRequest $request){


        $response = $this->paymentService->processRequest($request);



        return (isset($response->redirect_url)) ? redirect($response->redirect_url): $response;



    }
}
