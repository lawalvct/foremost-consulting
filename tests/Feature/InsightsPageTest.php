<?php

namespace Tests\Feature;

use Inertia\Testing\AssertableInertia as Assert;
use Tests\TestCase;

class InsightsPageTest extends TestCase
{
    public function test_insights_page_is_available(): void
    {
        $this->get(route('insights.index'))
            ->assertOk()
            ->assertInertia(fn (Assert $page) => $page
                ->component('Public/Insights'));
    }
}
