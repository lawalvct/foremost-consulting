<?php

namespace App\Http\Controllers\PublicSite;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class ServiceController extends Controller
{
    private const SERVICES = [
        'audit-and-assurance',
        'accounting-and-financial-management',
        'tax-and-regulatory-advisory',
        'management-and-business-advisory',
        'corporate-affairs-services',
        'investigation-and-special-engagements',
        'accounting-technology-and-systems',
        'training-and-capacity-development',
    ];

    public function __invoke(Request $request, string $service): Response
    {
        abort_unless(in_array($service, self::SERVICES, true), 404);

        return Inertia::render('Public/ServiceDetail', [
            'serviceSlug' => $service,
        ]);
    }
}
