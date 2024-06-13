<?php

namespace App\Http\Requests\Orders;

use Illuminate\Foundation\Http\FormRequest;

class CreditCardRequest extends FormRequest
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
            'card_number' => 'numeric|digits:16',
            'cvv' => 'numeric|digits:3',
            'expiry_date' => [ 'string' , 'regex:/^(0[1-9]|1[0-2])\/?([0-9]{2}|[0-9]{4})$/' ,
        
            function ($attribute, $value, $fail) {
                $parts = explode('/', $value);
                if (count($parts) != 2) {
                    return $fail('The ' . $attribute . ' is invalid.');
                }
                $month = (int) $parts[0];
                $year = (int) (strlen($parts[1]) == 2 ? '20' . $parts[1] : $parts[1]);
                $currentYear = (int) date('Y');
                $currentMonth = (int) date('m');
                if ($year < $currentYear || ($year == $currentYear && $month < $currentMonth)) {
                    return $fail('The ' . $attribute . ' is expired.');
                }
            }
        ],
         ];
    }
}
