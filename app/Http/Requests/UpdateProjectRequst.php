<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectRequst extends FormRequest
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
            'type' => 'nullable|in:development,design,marketing,research,',
            'start' => 'required|date|date_format:Y-m-d',
            'close' => 'required|date|date_format:Y-m-d',
            'image' => 'nullable|mimes:jpg,jpeg,png,gif|max:2048',

        ];
    }


    public function messages(): array
    {
        return [
            'name.min' => 'The :attribute must be at least :min characters long',
            'type.in' => 'Invalid :attribute selected',
            'start.date' => 'The :attribute must be a valid date format',
            'close.date' => 'The :attribute must be a valid date format',
            'image.mimes' => 'The image field must be a file of type: png, jpg, jpeg',

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
