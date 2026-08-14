<?php

namespace Tests\Feature;

use Inertia\Testing\AssertableInertia as Assert;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class IndustryPagesTest extends TestCase
{
    private const INDUSTRY_SLUGS = [
        'financial-services-and-microfinance',
        'government-and-public-sector',
        'education',
        'healthcare',
        'manufacturing',
        'hospitality',
        'oil-and-gas',
        'smes-and-growing-businesses',
    ];

    public function test_industries_overview_page_is_available(): void
    {
        $this->get(route('industries.index'))
            ->assertOk()
            ->assertInertia(fn (Assert $page) => $page
                ->component('Public/Industries'));
    }

    #[DataProvider('industrySlugProvider')]
    public function test_each_industry_detail_page_is_available(string $industrySlug): void
    {
        $this->get(route('industries.show', $industrySlug))
            ->assertOk()
            ->assertInertia(fn (Assert $page) => $page
                ->component('Public/IndustryDetail')
                ->where('industrySlug', $industrySlug));
    }

    public function test_unknown_industry_returns_not_found(): void
    {
        $this->get(route('industries.show', 'unknown-industry'))->assertNotFound();
    }

    public static function industrySlugProvider(): array
    {
        return array_map(
            fn (string $slug): array => [$slug],
            self::INDUSTRY_SLUGS,
        );
    }
}
