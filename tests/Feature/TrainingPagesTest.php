<?php

namespace Tests\Feature;

use Inertia\Testing\AssertableInertia as Assert;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class TrainingPagesTest extends TestCase
{
    private const PROGRAMME_SLUGS = [
        'young-accountants-practical-training',
        'corporate-in-house-training',
        'tax-and-compliance-workshops',
        'accounting-software-training',
        'custom-capacity-building-programmes',
    ];

    public function test_training_overview_page_is_available(): void
    {
        $this->get(route('training.index'))
            ->assertOk()
            ->assertInertia(fn (Assert $page) => $page
                ->component('Public/Training'));
    }

    #[DataProvider('programmeSlugProvider')]
    public function test_each_training_detail_page_is_available(string $programmeSlug): void
    {
        $this->get(route('training.show', $programmeSlug))
            ->assertOk()
            ->assertInertia(fn (Assert $page) => $page
                ->component('Public/TrainingDetail')
                ->where('trainingSlug', $programmeSlug));
    }

    public function test_unknown_training_programme_returns_not_found(): void
    {
        $this->get(route('training.show', 'unknown-programme'))->assertNotFound();
    }

    public static function programmeSlugProvider(): array
    {
        return array_map(
            fn (string $slug): array => [$slug],
            self::PROGRAMME_SLUGS,
        );
    }
}
