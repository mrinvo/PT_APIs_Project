<?php

namespace App\Http\Controllers;

use App\Http\Requests\HostedRequest;
use App\Http\Requests\InvoiceRequest;
use App\Repositories\PaymentRepository;
use App\Http\Requests\ValidateInitialRequest;
use App\Services\PaymentService;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Exists;

/**
 * Class PaymentController
 *
 * This class handles payment-related actions in the application.
 *
 * @package App\Http\Controllers
 */
class PaymentController extends Controller
{
    /**
     * The PaymentRepository instance used for database operations.
     *
     * @var PaymentRepository
     */
    protected $PaymentRepository;

    /**
     * PaymentController constructor.
     *
     * @param PaymentRepository $requestRepository The PaymentRepository instance.
     */
    public function __construct(PaymentRepository $requestRepository)
    {
        $this->PaymentRepository = $requestRepository;
    }

    /**
     * Initiate a hosted payment request.
     *
     * @param HostedRequest $request The hosted payment request object.
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response The response, which may include a redirection or a direct response.
     */
    public function initiateHosted(HostedRequest $request)
    {

        // Process the hosted payment request using the PaymentRepository.
        $response = $this->PaymentRepository->processRequest($request);

        // Check if a redirect URL is provided in the response and redirect the user if available.
        return (isset($response->redirect_url)) ? redirect($response->redirect_url) : view('error',compact('response'));
    }

    /**
     * Initiate an invoice payment request.
     *
     * @param InvoiceRequest $request The invoice payment request object.
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response The response, which may include a redirection or a direct response.
     */
    public function initiateInvoice(InvoiceRequest $request)
    {
        // Process the invoice payment request using the PaymentRepository.
        $response = $this->PaymentRepository->processRequest($request);



        // Check if an invoice link is provided in the response and redirect the user if available.
        return (isset($response->invoice_link)) ? redirect($response->invoice_link) : view('error',compact('response'));
    }

    public function return(Request $request){


        $response = $request->getContent();

        $array = explode("&", $request->getContent());


        return ($array[6]=="respStatus=A") ? view('success2',compact('response')) : view('error',compact('response'));
    }
}
