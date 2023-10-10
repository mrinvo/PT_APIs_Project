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
     * @var obje
     */
    protected $PaymentRepository;

    /**
     * DataWrapper constructor.
     *
     * @param FormRequest $request The payment request data.
     */
    public function __construct($request)
    {


        $this->PaymentRepository = new PaymentRepository;

        // Prepare customer details, shipping details, and user-defined objects based on the request.
        $this->customerDetails = $this->GenerateCustomerDetails($request);
        $this->shippingDetails = $this->GenerateShippingDetails($request);
        $this->userDefined = $this->GenerateUserDefined($request);

        // Set the payment type from the request.
        $this->paymentType = $request->payment_type;


        // Prepare the payload based on the payment type. -switch case

        switch($this->paymentType){

            case 'hosted':

                $this->payload = $this->GenerateHostedPayload($request, $this->customerDetails);

                break;
            
            case 'invoice':

                $this->payload = $this->GenerateInvoicePayload($request, $this->customerDetails);

                break;


                
        }

      
        }
    

        /**
     * Generate customer details based on a given request.
     *
     * @param mixed $request The payment request data.
     * @return array<string, mixed> Customer details.
     */
    public function GenerateCustomerDetails($request)
    {
        // Generate and return customer details array.
        $customerDetails = [
            'name' => $request->customer_name,
            'email' => $request->customer_email,
            "phone" => $request->customer_phone,
            "street1" => $request->customer_street,
            "city" => $request->customer_city,
            "state" => $request->customer_state,
            "country" => $request->customer_country,
            "zip" => $request->customer_street
        ];

        return $customerDetails;
    }

        /**
     * Generate shipping details based on a given request.
     *
     * @param mixed $request The payment request data.
     * @return array<string, mixed> Shipping details.
     */
    public function GenerateShippingDetails($request)
    {
        // Generate and return shipping details array.
        $shippingDetails = [
            'name' => $request->shipping_name,
            'email' => $request->shipping_email,
            "phone" => $request->shipping_phone,
            "street1" => $request->shipping_street,
            "city" => $request->shipping_city,
            "state" => $request->shipping_state,
            "country" => $request->shipping_country,
            "zip" => $request->shipping_street
        ];

        return $shippingDetails;
    }

        /**
     * Generate user-defined data based on a given request.
     *
     * @param mixed $request The payment request data.
     * @return array<string, mixed> User-defined data.
     */
    public function GenerateUserDefined($request)
    {
        // Generate and return user-defined data array.
        $userDefined = [
            'UDF1' => $request->udf1,
            'UDF2' => $request->udf2,
            'UDF3' => $request->udf3,
            'UDF4' => $request->udf4,
            'UDF5' => $request->udf5,
            'UDF6' => $request->udf6,
            'UDF7' => $request->udf7,
            'UDF8' => $request->udf8,
            'UDF9' => $request->udf9,
        ];

        return $userDefined;
    }


    /**
     * Generate a payload for hosted payment based on the request and associated data.
     *
     * @param mixed $request The payment request data.
     * @param array<string, mixed>|null $customerDetails Customer details.
     * @param array<string, mixed>|null $shippingDetails Shipping details.
     * @param array<string, mixed>|null $userDefined User-defined data.
     * @return array<string, mixed> The generated payload.
     */
    public function GenerateHostedPayload($request = null, $customerDetails = null, $shippingDetails = null, $userDefined = null)
    {
        $payload = [];

        // Generate the payload for hosted payment and return it.
        $payload = [
            "profile_id" => env('PT_PROFILE_ID'),
            "tran_type" => $request->tran_type,
            "tran_class" => $request->tran_class,
            // "cart_id" => $request->cart_id,
            "cart_currency" => $request->cart_currency,
            "cart_amount" => (double)$request->cart_amount,
            "cart_description" => $request->cart_description,
            "paypage_lang" => "en",
            "payment_methods" => ["all"],
            "customer_details" => $customerDetails,
            "shipping_details" => $shippingDetails,
            "user_defined" => $userDefined,
        ];

        return $payload;
    }

    /**
     * Generate a payload for invoice payment based on the request and associated data.
     *
     * @param mixed $request The payment request data.
     * @param array<string, mixed>|null $customerDetails Customer details.
     * @param array<string, mixed>|null $shippingDetails Shipping details.
     * @param array<string, mixed>|null $userDefined User-defined data.
     * @return array<string, mixed> The generated payload.
     */
/**
 * Generate a payload for invoice payment based on the request and associated data.
 *
 * @param mixed $request The payment request data.
 * @param array<string, mixed>|null $customerDetails Customer details.
 * @param array<string, mixed>|null $shippingDetails Shipping details.
 * @param array<string, mixed>|null $userDefined User-defined data.
 * @return array<string, mixed> The generated payload.
 */
public function GenerateInvoicePayload($request, $customerDetails = null, $shippingDetails = null, $userDefined = null)
{
    $line_items = [];

    // Extract line items from the request and convert unit cost to a double.
    $lineItems = $request['line_items'];

    foreach ($lineItems as $lineItem) {
        $lineItem["unit_cost"] = (double)$lineItem["unit_cost"];
        $line_items[] = $lineItem;
    }

    // Generate the payload for invoice payment and return it.
    $payload = [
        "profile_id" => env('PT_PROFILE_ID'),
        "tran_type" => config('paytabs.tran_type'),
        "tran_class" => config('paytabs.tran_class'),
        "cart_id" => $request->cart_id,
        "cart_currency" => $request->cart_currency,
        "cart_amount" => (double)$request->cart_amount,
        "cart_description" => $request->cart_description,
        "paypage_lang" => "en",
        "payment_methods" => ["all"],
        "invoice" => ["line_items" => $line_items],
        "customer_details" => $customerDetails,
        "shipping_details" => $shippingDetails,
        "user_defined" => $userDefined,
    ];

    return $payload;
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
