<?php

namespace App\Repositories;


use App\Traits\SendRequestTrait;
use App\Http\Resources\DataWrapper;
use Illuminate\Foundation\Http\FormRequest;
/**
 * Class PaymentRepository
 *
 * This class provides methods for generating payment-related data.
 */
class PaymentRepository
{

    use SendRequestTrait;
    /**
     * Process a payment request by preparing the passed request and transform it into payload to send it to client
     *
     * @param FormRequest $request The payment validated accepted request data.
     * @return mixed The result of the payment request.
     */
    public function processRequest($request)
    {
        // Create a DataWrapper instance to prepare the request data.
        $response = new DataWrapper($request);

        // Convert the wrapped data to an array.
        $payload = $response->toArray();

        // Send the payment request using the SendRequestTrait.
        return $payment = $this->sendPaymentRequest($request->payment_type, $payload);
    }






}
