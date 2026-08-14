<?php

namespace App\Http\Controllers\PublicSite;

use App\Http\Controllers\Controller;
use Inertia\Inertia;
use Inertia\Response;

class TrainingController extends Controller
{
    private const PROGRAMMES = [
        'young-accountants-practical-training',
        'corporate-in-house-training',
        'tax-and-compliance-workshops',
        'accounting-software-training',
        'custom-capacity-building-programmes',
    ];

    public function __invoke(string $trainingProgram): Response
    {
        abort_unless(in_array($trainingProgram, self::PROGRAMMES, true), 404);

        return Inertia::render('Public/TrainingDetail', [
            'trainingSlug' => $trainingProgram,
        ]);
    }
}
