<?php

namespace App\Http\Requests\Orders;

use Illuminate\Foundation\Http\FormRequest;

class OrdersRequest extends FormRequest
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
           
            'payment_method'   => 'required|in:cash,credit card',
            'location'         => 'required|in:alexandria,aswan,dakahlia,fayoum,cairo,beheria,asyut,beni suef,gharbia,demietta,giza',
            'location_details' => 'required|min:10|max:255|',

        ];
    }
}
