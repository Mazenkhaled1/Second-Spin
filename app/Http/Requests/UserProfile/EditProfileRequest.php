<?php

namespace App\Http\Requests\UserProfile;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class EditProfileRequest extends FormRequest
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
            'name'     => 'min:3|max:20',
            'email'    => [ 'email','unique:users,email,'. auth()->user()->id.',id'],
            'password' => [Password::min(8)->mixedCase()->numbers()->symbols()],
            'image'    => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048 ',
        ];
    }
}