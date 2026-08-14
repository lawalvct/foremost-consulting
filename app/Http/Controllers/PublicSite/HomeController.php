<?php

namespace App\Http\Controllers\PublicSite;

use App\Http\Controllers\Controller;
use Inertia\Inertia;
use Inertia\Response;

class HomeController extends Controller
{
    public function __invoke(): Response
    {
        $configuredVariant = config('foremost.homepage_variant');
        $homepageVariant = in_array($configuredVariant, ['v1', 'v2'], true)
            ? $configuredVariant
            : 'v2';

        return Inertia::render('Public/Home', [
            'homepageVariant' => $homepageVariant,
        ]);
    }
}
