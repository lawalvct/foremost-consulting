<?php

namespace App\Http\Controllers\PublicSite;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreConsultationRequest;
use App\Models\ConsultationRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;
use Inertia\Response;
use Throwable;

class ConsultationController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Public/Consultation', [
            'serviceOptions' => StoreConsultationRequest::serviceOptions(),
            'industryOptions' => StoreConsultationRequest::industryOptions(),
        ]);
    }

    public function store(StoreConsultationRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $email = strtolower($validated['email']);
        $emailRateLimitKey = 'consultation-email:'.hash('sha256', $email);

        if (RateLimiter::tooManyAttempts($emailRateLimitKey, 5)) {
            throw ValidationException::withMessages([
                'email' => 'Too many requests have been submitted for this email address. Please try again later.',
            ]);
        }

        RateLimiter::hit($emailRateLimitKey, 60);

        $attachment = $request->file('attachment');
        $attachmentPath = null;

        if ($attachment !== null) {
            $storedPath = $attachment->store(
                'consultation-attachments/'.now()->format('Y/m'),
                'local',
            );

            if ($storedPath === false) {
                throw ValidationException::withMessages([
                    'attachment' => 'The attachment could not be stored. Please try again without it.',
                ]);
            }

            $attachmentPath = $storedPath;
        }

        try {
            ConsultationRequest::create([
                'full_name' => $validated['full_name'],
                'organisation' => $validated['organisation'],
                'job_title' => $validated['job_title'] ?? null,
                'email' => $email,
                'phone' => $validated['phone'],
                'location' => $validated['location'] ?? null,
                'service_key' => $validated['service_key'],
                'industry' => $validated['industry'] ?? null,
                'description' => $validated['description'],
                'preferred_contact_method' => $validated['preferred_contact_method'],
                'preferred_at' => $validated['preferred_at'] ?? null,
                'attachment_disk' => $attachmentPath !== null ? 'local' : null,
                'attachment_path' => $attachmentPath,
                'attachment_original_name' => $attachment !== null
                    ? Str::limit(str_replace(["\0", "\r", "\n"], '', $attachment->getClientOriginalName()), 255, '')
                    : null,
                'status' => 'new',
                'consent_at' => now(),
                'source_url' => Str::limit((string) $request->headers->get('referer'), 2048, ''),
            ]);
        } catch (Throwable $exception) {
            if ($attachmentPath !== null) {
                Storage::disk('local')->delete($attachmentPath);
            }

            throw $exception;
        }

        Inertia::flash('toast', [
            'type' => 'success',
            'message' => 'Your consultation request has been received.',
        ]);

        return back();
    }
}
