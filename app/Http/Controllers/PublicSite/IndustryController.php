<?php

namespace App\Http\Controllers\PublicSite;

use App\Http\Controllers\Controller;
use Inertia\Inertia;
use Inertia\Response;

class IndustryController extends Controller
{
    private const INDUSTRIES = [
        'financial-services-and-microfinance',
        'government-and-public-sector',
        'education',
        'healthcare',
        'manufacturing',
        'hospitality',
        'oil-and-gas',
        'smes-and-growing-businesses',
    ];

    public function __invoke(string $industry): Response
    {
        abort_unless(in_array($industry, self::INDUSTRIES, true), 404);

        return Inertia::render('Public/IndustryDetail', [
            'industrySlug' => $industry,
        ]);
    }
}
