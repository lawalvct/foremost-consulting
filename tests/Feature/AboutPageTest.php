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

    public function test_about_page_source_includes_the_approved_leadership_team(): void
    {
        $source = file_get_contents(resource_path('js/pages/Public/About.vue'));

        $this->assertIsString($source);
        $this->assertStringContainsString('Benjamin Akanji Omonayajo', $source);
        $this->assertStringContainsString('Jubril Olawale Lawal', $source);
        $this->assertStringContainsString('Moshood Obasanjo Sadiq', $source);
        $this->assertStringContainsString("role: 'Associate Partner'", $source);
        $this->assertStringContainsString('/brand/leadership/benjamin-omonayajo.webp', $source);
        $this->assertStringContainsString('/brand/leadership/jubril-lawal.webp', $source);
        $this->assertStringContainsString('/brand/leadership/moshood-sadiq.webp', $source);
    }
}
