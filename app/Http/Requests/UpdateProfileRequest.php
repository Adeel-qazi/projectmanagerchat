<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class UpdateProfileRequest extends FormRequest
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
            'name' => 'nullable|string|min:3',
            'email' => 'nullable|email',
            'password' => ['nullable','confirmed', Password::min(5)],
            'image' => 'nullable|mimes:jpg,jpeg,png,gif|max:2048',

        ];
        
    }


    public function messages(): array
    {
        return [
        'name.min' => 'The :attribute must be at least :min characters long',
        'password.min' => 'The :attribute must be at least :min characters long',
        'password.confirmed' => 'The :attribute confirmation does not match',
        'image.mimes' => 'The image field must be a file of type: png, jpg, jpeg',
        ];
    }
}
