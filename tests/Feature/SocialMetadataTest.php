<?php

namespace Tests\Feature;

use Tests\TestCase;

class SocialMetadataTest extends TestCase
{
    public function test_homepage_exposes_complete_social_sharing_metadata(): void
    {
        $response = $this->get(route('home'));

        $response
            ->assertOk()
            ->assertSee('property="og:title"', false)
            ->assertSee('property="og:description"', false)
            ->assertSee('property="og:image"', false)
            ->assertSee('/brand/foremost-social-card.png?v=20260815', false)
            ->assertSee('property="og:image:width" content="1200"', false)
            ->assertSee('property="og:image:height" content="630"', false)
            ->assertSee('name="twitter:card" content="summary_large_image"', false);
    }
}
