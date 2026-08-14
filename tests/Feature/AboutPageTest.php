<?php

namespace Tests\Feature;

use Inertia\Testing\AssertableInertia as Assert;
use Tests\TestCase;

class AboutPageTest extends TestCase
{
    public function test_about_page_is_available(): void
    {
        $response = $this->get(route('about'));

        $response
            ->assertOk()
            ->assertInertia(fn (Assert $page) => $page
                ->component('Public/About'));
    }
}
