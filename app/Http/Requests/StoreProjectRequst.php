<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequst extends FormRequest
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
            'type' => 'required|in:development,design,marketing,research,',
            'start' => 'required|date|date_format:Y-m-d',
            'close' => 'required|date|date_format:Y-m-d',
            'image' => 'required|mimes:jpeg,png,jpg,gif',

        ];
    }


    public function messages(): array
    {
        return [
            'name.required' => 'The :attribute must be required',
            'name.min' => 'The :attribute must be at least :min characters long',
            'type.required' => 'The :attribute field must be required',
            'type.in' => 'Invalid :attribute selected',
            'start.required' => 'The :attribute field must be required',
            'start.date' => 'The :attribute must be a valid date format',
            'close.required' => 'The :attribute field must be required',
            'close.date' => 'The :attribute must be a valid date format',
            'image.required' => 'The :attribute must be required',
             'image.mimes' => 'The :attribute must be a valid image with :mimes format.',

        ];
    }


    public function attributes(): array
    {
        return [
            'name' => 'Full Name',
            'type' => 'Project Type',
            'start' => 'Start Date',
            'close' => 'Close Date',
            
        ];
    }
}
