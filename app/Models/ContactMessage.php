<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property string $full_name
 * @property string|null $organisation
 * @property string $email
 * @property string|null $phone
 * @property string $subject
 * @property string $message
 * @property string $status
 * @property string|null $internal_notes
 * @property Carbon $consent_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 */
#[Fillable([
    'full_name',
    'organisation',
    'email',
    'phone',
    'subject',
    'message',
    'status',
    'internal_notes',
    'consent_at',
])]
class ContactMessage extends Model
{
    protected function casts(): array
    {
        return [
            'consent_at' => 'datetime',
        ];
    }
}
