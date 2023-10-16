<?php

namespace App\Traits;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Trait SendRequestTrait
 *
 * This trait provides methods for sending payment requests using GuzzleHTTP.
 */
trait SendRequestTrait
{
    /**
     * Send a payment request to a specific endpoint.
     *
     * @param string $paymentType The type of payment (e.g., hosted or invoice).
     * @param array<string, FormRequest> $data The data to be sent in the request.
     * @return FormRequest The response from the payment service or an error message.
     */
    public function sendPaymentRequest($paymentType, $data)
    {
        try {
            // Create a GuzzleHTTP client.
            $client = new Client();

            // Determine the payment service domain based on the region.
            $domain = 'paytabs.' . env('PT_REGION');
            $region = config($domain);

            // Get the URL for the specified payment type.
            $url = $region[$paymentType];

            // Send a POST request to the payment service.
            $paymentRequest = $client->request('POST', $url, [
                'headers' => [
                    'Authorization' => env('PT_API_KEY'),
                ],
                'json' => $data,
            ]);


            // Return the JSON-decoded response.
            return json_decode($paymentRequest->getBody());

        } catch (RequestException $e) {


            // If there is an error, return the error message.
            return $e->getResponse()->getBody()->getContents();
        }
    }
}
