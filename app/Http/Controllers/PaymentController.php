<?php

namespace App\Http\Controllers;

use App\Http\Requests\HostedRequest;
use App\Http\Requests\InvoiceRequest;
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

    public function initiateHosted(HostedRequest $request){


        $response = $this->paymentService->processRequest($request);



        return (isset($response->redirect_url)) ? redirect($response->redirect_url): $response;



    }

    public function initiateInvoice(InvoiceRequest $request){


        $response = $this->paymentService->processRequest($request);



        return (isset($response->invoice_link)) ? redirect($response->invoice_link): $response;



    }
}
