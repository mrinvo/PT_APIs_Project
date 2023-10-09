<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HostedRequest extends FormRequest
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

            //transaction
            "tran_type" => "required",
            "tran_class" => "required",

             //cart
            "cart_id" => 'required',
            "cart_currency" => "required",
            "cart_amoun" => 'required',
            "cart_description" => "required",

            //billing
            "customer_name" => "required",

            "customer_email" => "required",

            "customer_phone" => "required",

            "customer_street" => "required",

            "customer_country" => "required",

            "customer_city" => "required",

            "customer_state" => "required",

            "customer_zip" => "required",


        ];
    }
}
