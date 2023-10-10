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
             //transaction fiealds
             "tran_type" => "required|in:sale,auth,capture,void,refund,register",
             "tran_class" => "required|in:ecom,recurring",

              //cart fiealds
             "cart_id" => 'required',
             "cart_currency" => "required",
             "cart_amount" => 'required|numeric',
             "cart_description" => "required",

             //billing fiealds
             "customer_name" => "required",

             "customer_email" => "required|email",

             "customer_phone" => "required|numeric",

             "customer_street" => "required",

             "customer_country" => "required",

             "customer_city" => "required",

             "customer_state" => "required",

             "customer_zip" => "required|numeric",

             //invoice
             "line_items|required|array",
             "line_items.unit_cost|required|numeric",
             "line_items.quantity|required|numeric",

             //shipping fields
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
