<?php

namespace App\Repositories;

/**
 * Class PaymentRepository
 *
 * This class provides methods for generating payment-related data.
 */
class PaymentRepository
{
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
            "cart_id" => $request->cart_id,
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
    public function GenerateInvoicePayload($request, $customerDetails = null, $shippingDetails = null, $userDefined = null)
    {
        $payload = [];

        // Generate the payload for invoice payment and return it.
        $payload = [
            "profile_id" => env('PT_PROFILE_ID'),
            "tran_type" => $request->tran_type,
            "tran_class" => $request->tran_class,
            "cart_id" => $request->cart_id,
            "cart_currency" => $request->cart_currency,
            "cart_amount" => (double)$request->cart_amount,
            "cart_description" => $request->cart_description,
            "paypage_lang" => "en",
            "payment_methods" => ["all"],
            "invoice" => [],
            "customer_details" => $customerDetails,
            "shipping_details" => $shippingDetails,
            "user_defined" => $userDefined,
        ];

        return $payload;
    }
}
