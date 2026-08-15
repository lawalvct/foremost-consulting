<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property string $full_name
 * @property string $organisation
 * @property string|null $job_title
 * @property string $email
 * @property string $phone
 * @property string|null $location
 * @property string $service_key
 * @property string|null $industry
 * @property string $description
 * @property string $preferred_contact_method
 * @property Carbon|null $preferred_at
 * @property string|null $attachment_disk
 * @property string|null $attachment_path
 * @property string|null $attachment_original_name
 * @property string $status
 * @property int|null $assigned_to
 * @property string|null $internal_notes
 * @property Carbon $consent_at
 * @property string|null $source_url
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 */
#[Fillable([
    'full_name',
    'organisation',
    'job_title',
    'email',
    'phone',
    'location',
    'service_key',
    'industry',
    'description',
    'preferred_contact_method',
    'preferred_at',
    'attachment_disk',
    'attachment_path',
    'attachment_original_name',
    'status',
    'assigned_to',
    'internal_notes',
    'consent_at',
    'source_url',
])]
class ConsultationRequest extends Model
{
    protected function casts(): array
    {
        return [
            'preferred_at' => 'datetime',
            'consent_at' => 'datetime',
        ];
    }
}
