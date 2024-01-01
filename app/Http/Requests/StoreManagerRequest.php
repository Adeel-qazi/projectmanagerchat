<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class StoreManagerRequest extends FormRequest
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
            'name' => 'required|string|min:3',
            'email' => 'required|email|unique:managers',
            'password' => ['required', 'confirmed', Password::min(5)],
            'image' => 'required|mimes:jpeg,png,jpg,gif',
        ];
    }

    public function messages(): array
    {
        return [
        'name.required' => 'The :attribute must be required',
        'name.min' => 'The :attribute must be at least :min characters long',
        'email.required' => 'The :attribute field must be required',
        'email.email' => 'The :attribute field must be a valid email address',
        'password.required' => 'The :attribute field must be required',
        'password.min' => 'The :attribute must be at least :min characters long',
        'password.confirmed' => 'The :attribute confirmation does not match',
        'image.required' => 'The :attribute must be required',
        'image.image' => 'The :attribute must be a valid image with :mimes format.',
        ];
    }

    public function attributes(): array
    {
        return [
            'name.' => 'Full Name',
            'email' => 'Username',
            'password' => 'Password',
        ];
    }
}
