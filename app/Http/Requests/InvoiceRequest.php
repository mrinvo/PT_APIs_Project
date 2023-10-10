<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InvoiceRequest extends FormRequest
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
            //

             //cart fiealds
             "cart_id" => 'required|min:1|max:64',
             "cart_currency" => "required|in:EGP,USD,AED,SAR",
             "cart_amount" => 'required|numeric|min:0.01|max:9999999999.99',
             "cart_description" => "required|min:1|max:128",

             //billing fiealds
             "customer_name" => "required|max:128|min:4",

             "customer_email" => "required|email",

             "customer_phone" => "required",

             "customer_street" => "required|max:128|min:4",

             "customer_country" => "required|in:AE,EG,SA,CA,GB,AU,DE",

             "customer_city" => "required|max:128|min:4",

             "customer_state" => "required|max:128|min:4",

             "customer_zip" => "required|numeric",

             "line_items" => "required",

             "line_items.*.unit_cost" => "Required",
             "line_items.*.quantity" => "Required",

             //shipping fields
             // "shipping_name" => "required|max:128|min:4",

             // "shipping_email" => "required|email",

             // "shipping_phone" => "required|regex:/^[0-9]{10}$/",

             // "shipping_street" => "required|max:128|min:4",

             // "shipping_country" => "required|in:AE,EG,SA,CA,GB,AU,DE",

             // "shipping_city" => "required|max:128|min:4",

             // "shipping_state" => "required|max:128|min:4",

             // "shipping_zip" => "required|numeric|max:7|min:5",

        ];
    }
}
