<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateInitialRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //billing
            "customer_name" => "required",

            "customer_email" => "required",

            "customer_phone" => "required",

            "customer_street" => "required",

            "customer_country" => "required",

            "customer_city" => "required",

            "customer_state" => "required",

            "customer_zip" => "required",

            //shipping
            // "shipping_name" => "required",

            // "shipping_email" => "required",

            // "shipping_phone" => "required",

            // "shipping_street" => "required",

            // "shipping_country" => "required",

            // "shipping_city" => "required",

            // "shipping_state" => "required",

            // "shipping_zip" => "required"
        ];
    }
}
