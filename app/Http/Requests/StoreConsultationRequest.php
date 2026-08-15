<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreConsultationRequest extends FormRequest
{
    /**
     * @var array<string, string>
     */
    public const SERVICES = [
        'audit-and-assurance' => 'Audit & Assurance',
        'accounting-and-financial-management' => 'Accounting & Financial Management',
        'tax-and-regulatory-advisory' => 'Tax & Regulatory Advisory',
        'management-and-business-advisory' => 'Management & Business Advisory',
        'corporate-affairs' => 'Corporate Affairs',
        'investigation-special-engagement' => 'Investigation/Special Engagement',
        'accounting-technology' => 'Accounting Technology',
        'training' => 'Training',
        'other' => 'Other',
    ];

    /**
     * @var list<string>
     */
    public const INDUSTRIES = [
        'Financial Services & Microfinance',
        'Government & Public Sector',
        'Education',
        'Healthcare',
        'Manufacturing',
        'Hospitality',
        'Oil & Gas',
        'SMEs & Growing Businesses',
        'Other',
    ];

    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, list<mixed>>
     */
    public function rules(): array
    {
        return [
            'full_name' => ['required', 'string', 'max:150'],
            'organisation' => ['required', 'string', 'max:180'],
            'job_title' => ['nullable', 'string', 'max:120'],
            'email' => ['required', 'email:rfc', 'max:254'],
            'phone' => ['required', 'string', 'max:40', 'regex:/^[0-9+() .-]+$/'],
            'location' => ['nullable', 'string', 'max:180'],
            'service_key' => ['required', 'string', Rule::in(array_keys(self::SERVICES))],
            'industry' => ['nullable', 'string', Rule::in(self::INDUSTRIES)],
            'description' => ['required', 'string', 'min:30', 'max:7000'],
            'preferred_contact_method' => [
                'required',
                'string',
                Rule::in(['email', 'phone', 'whatsapp']),
            ],
            'preferred_at' => ['nullable', 'date', 'after_or_equal:now'],
            'attachment' => [
                'nullable',
                'file',
                'max:5120',
                'mimes:pdf,docx,xlsx,jpg,jpeg,png',
                'mimetypes:application/pdf,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,image/jpeg,image/png',
            ],
            'consent' => ['accepted'],
            'website' => ['nullable', 'size:0'],
            'started_at' => [
                'required',
                'integer',
                'gte:'.(time() - 7200),
                'lte:'.(time() - 3),
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'consent.accepted' => 'Please confirm that Foremost may use these details to respond to your request.',
            'description.min' => 'Please provide a little more detail about the support you need.',
            'attachment.max' => 'The attachment must not be larger than 5 MB.',
            'attachment.mimes' => 'The attachment must be a PDF, DOCX, XLSX, JPG or PNG file.',
            'attachment.mimetypes' => 'The attachment type could not be verified.',
            'started_at.lte' => 'Please wait a moment before submitting the form.',
            'started_at.gte' => 'This form has expired. Please refresh the page and try again.',
        ];
    }

    /**
     * @return list<array{value: string, label: string}>
     */
    public static function serviceOptions(): array
    {
        return array_map(
            fn (string $value, string $label): array => compact('value', 'label'),
            array_keys(self::SERVICES),
            array_values(self::SERVICES),
        );
    }

    /**
     * @return list<array{value: string, label: string}>
     */
    public static function industryOptions(): array
    {
        return array_map(
            fn (string $industry): array => [
                'value' => $industry,
                'label' => $industry,
            ],
            self::INDUSTRIES,
        );
    }
}
