<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactMessageRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, list<string>>
     */
    public function rules(): array
    {
        return [
            'full_name' => ['required', 'string', 'max:150'],
            'organisation' => ['nullable', 'string', 'max:180'],
            'email' => ['required', 'email:rfc', 'max:254'],
            'phone' => ['nullable', 'string', 'max:40', 'regex:/^[0-9+() .-]+$/'],
            'subject' => ['required', 'string', 'max:180'],
            'message' => ['required', 'string', 'min:20', 'max:5000'],
            'consent' => ['accepted'],
            'website' => ['nullable', 'size:0'],
            'started_at' => [
                'required',
                'integer',
                'gte:'.(time() - 7200),
                'lte:'.(time() - 2),
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'consent.accepted' => 'Please confirm that Foremost may use these details to respond to your enquiry.',
            'message.min' => 'Please provide a little more detail so the team can understand your enquiry.',
            'started_at.lte' => 'Please wait a moment before submitting the form.',
            'started_at.gte' => 'This form has expired. Please refresh the page and try again.',
        ];
    }
}
