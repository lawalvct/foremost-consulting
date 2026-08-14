<?php

namespace Tests\Feature;

use Inertia\Testing\AssertableInertia as Assert;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class ServicePagesTest extends TestCase
{
    private const SERVICE_SLUGS = [
        'audit-and-assurance',
        'accounting-and-financial-management',
        'tax-and-regulatory-advisory',
        'management-and-business-advisory',
        'corporate-affairs-services',
        'investigation-and-special-engagements',
        'accounting-technology-and-systems',
        'training-and-capacity-development',
    ];

    public function test_services_overview_page_is_available(): void
    {
        $this->get(route('services.index'))
            ->assertOk()
            ->assertInertia(fn (Assert $page) => $page
                ->component('Public/Services'));
    }

    #[DataProvider('serviceSlugProvider')]
    public function test_each_service_detail_page_is_available(string $serviceSlug): void
    {
        $this->get(route('services.show', $serviceSlug))
            ->assertOk()
            ->assertInertia(fn (Assert $page) => $page
                ->component('Public/ServiceDetail')
                ->where('serviceSlug', $serviceSlug));
    }

    public function test_unknown_service_returns_not_found(): void
    {
        $this->get(route('services.show', 'unknown-service'))->assertNotFound();
    }

    public static function serviceSlugProvider(): array
    {
        return array_map(
            fn (string $slug): array => [$slug],
            self::SERVICE_SLUGS,
        );
    }
}
