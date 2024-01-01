<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SendMessageRequest extends FormRequest
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
            'content' => 'nullable|string',
            'image_path' => 'nullable|mimes:jpg,jpeg,png,gif|max:2048',
            'video_path' => 'nullable|mimes:mp4,mov,avi',
            'voice_note' => 'nullable|mimes:mp3,wav',
            'project_id' => '',
        ];
    }

    public function messages(): array
    {
        return [
            'content.string' => 'The :attribute must be a valid string',
            'image_path.mimes' => 'The :attribute must be a file of type: :values',
            'video_path.mimes' => 'The :attribute must be a file of type: :values',
            'voice_note.mimes' => 'The :attribute must be a file of type: :values',
        ];
    }
}
