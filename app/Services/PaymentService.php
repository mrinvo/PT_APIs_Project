<?php

namespace App\Services;

use App\Repositories\PaymentRepository;
use App\Traits\SendRequestTrait;
use App\Http\Resources\DataWrapper;

/**
 * Class PaymentService
 *
 * This class provides services related to payment processing.
 */
class PaymentService
{
    /**
     * The PaymentRepository instance used for database operations.
     *
     * @var PaymentRepository
     */
    protected $PaymentRepository;

    use SendRequestTrait;

    /**
     * PaymentService constructor.
     *
     * @param PaymentRepository $requestRepository The PaymentRepository instance.
     */
    public function __construct(PaymentRepository $requestRepository)
    {
        $this->PaymentRepository = $requestRepository;
    }

    /**
     * Process a payment request.
     *
     * @param mixed $request The payment request data.
     * @return mixed The result of the payment request.
     */
    public function processRequest($request)
    {
        // Create a DataWrapper instance to wrap the request data.
        $response = new DataWrapper($request);

        // Convert the wrapped data to an array.
        $payload = $response->toArray();

        // Send the payment request using the SendRequestTrait.
        return $payment = $this->sendPaymentRequest($request->payment_type, $payload);
    }
}
