<?php

namespace Tests\Feature;

use Inertia\Testing\AssertableInertia as Assert;
use Tests\TestCase;

class HomepageVariantTest extends TestCase
{
    public function test_homepage_uses_version_two_by_default(): void
    {
        config()->set('foremost.homepage_variant', 'v2');

        $response = $this->get(route('home'));

        $response
            ->assertOk()
            ->assertInertia(fn (Assert $page) => $page
                ->component('Public/Home')
                ->where('homepageVariant', 'v2'));
    }

    public function test_homepage_can_use_preserved_version_one(): void
    {
        config()->set('foremost.homepage_variant', 'v1');

        $response = $this->get(route('home'));

        $response
            ->assertOk()
            ->assertInertia(fn (Assert $page) => $page
                ->component('Public/Home')
                ->where('homepageVariant', 'v1'));
    }

    public function test_invalid_homepage_variant_falls_back_to_version_two(): void
    {
        config()->set('foremost.homepage_variant', 'unexpected');

        $response = $this->get(route('home'));

        $response
            ->assertOk()
            ->assertInertia(fn (Assert $page) => $page
                ->component('Public/Home')
                ->where('homepageVariant', 'v2'));
    }

    public function test_confirmed_whatsapp_number_is_shared_with_public_pages(): void
    {
        config()->set('foremost.whatsapp_number', '2348012345678');

        $response = $this->get(route('home'));

        $response
            ->assertOk()
            ->assertInertia(fn (Assert $page) => $page
                ->where('site.whatsappNumber', '2348012345678'));
    }
}
