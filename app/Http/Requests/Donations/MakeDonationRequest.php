<?php

namespace App\Http\Requests\Donations;
use Illuminate\Foundation\Http\FormRequest;

class MakeDonationRequest extends FormRequest
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
            'description' => 'required|min:10|max:255|',
            'title'       => 'required|min:5|max:255|',
            'location'    => 'required|in:alexandria,aswan,dakahlia,fayoum,cairo,beheria,asyut,beni suef,gharbia,demietta,giza ', 
            'location_details' => 'required|min:10|max:255|',
            'image' => 'required|mimes:png,jpeg,jpg,gif,svg|max:2048',
        ];
    }
}