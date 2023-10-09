<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Repositories\PaymentRepository;

/**
 * Class DataWrapper
 *
 * This class represents a data wrapper used for payment-related operations.
 */
class DataWrapper
{
    /**
     * The customer details associated with the payment data.
     *
     * @var mixed
     */
    public $customerDetails;

    /**
     * The shipping details associated with the payment data.
     *
     * @var mixed
     */
    public $shippingDetails;

    /**
     * User-defined data associated with the payment.
     *
     * @var mixed
     */
    public $userDefined;

    /**
     * Invoice data, if applicable.
     *
     * @var mixed
     */
    public $invoice;

    /**
     * The type of payment (e.g., hosted or invoice).
     *
     * @var string
     */
    public $paymentType;

    /**
     * The payload data for the payment request.
     *
     * @var mixed
     */
    public $payload;

        /**
     * The instance of the payment Repository.
     *
     * @var mixed
     */
    protected $PaymentRepository;

    /**
     * DataWrapper constructor.
     *
     * @param mixed $request The payment request data.
     */
    public function __construct($request)
    {
        // Create a new PaymentRepository instance.
        $requestRepository = new PaymentRepository;

        // Set the PaymentRepository instance.
        $this->PaymentRepository = $requestRepository;

        // Generate customer details, shipping details, and user-defined data based on the request.
        $this->customerDetails = $this->PaymentRepository->GenerateCustomerDetails($request);
        $this->shippingDetails = $this->PaymentRepository->GenerateShippingDetails($request);
        $this->userDefined = $this->PaymentRepository->GenerateUserDefined($request);

        // Set the payment type from the request.
        $this->paymentType = $request->payment_type;

        // Generate the payload based on the payment type.
        if ($this->paymentType == "hosted") {
            $this->payload = $this->PaymentRepository->GenerateHostedPayload($request, $this->customerDetails);
        } elseif ($this->paymentType == "invoice") {
            $this->payload = $this->PaymentRepository->GenerateInvoicePayload($request, $this->customerDetails);
        }
    }

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed> The payload data.
     */
    public function toArray()
    {
        return $this->payload;
    }
}
