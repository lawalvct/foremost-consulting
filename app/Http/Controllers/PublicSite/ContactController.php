<?php

namespace App\Http\Controllers\PublicSite;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContactMessageRequest;
use App\Models\ContactMessage;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class ContactController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Public/Contact');
    }

    public function store(StoreContactMessageRequest $request): RedirectResponse
    {
        $validated = $request->safe()->except([
            'consent',
            'website',
            'started_at',
        ]);

        ContactMessage::create([
            ...$validated,
            'email' => strtolower($validated['email']),
            'status' => 'new',
            'consent_at' => now(),
        ]);

        Inertia::flash('toast', [
            'type' => 'success',
            'message' => 'Your message has been received.',
        ]);

        return back();
    }
}
