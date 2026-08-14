<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Inertia\Testing\AssertableInertia as Assert;
use Tests\TestCase;

class ContactPageTest extends TestCase
{
    use RefreshDatabase;

    public function test_contact_page_is_available(): void
    {
        $this->get(route('contact.index'))
            ->assertOk()
            ->assertInertia(fn (Assert $page) => $page
                ->component('Public/Contact'));
    }

    public function test_a_valid_contact_message_is_stored(): void
    {
        $response = $this->from(route('contact.index'))->post(route('contact.store'), [
            'full_name' => 'Ada Okafor',
            'organisation' => 'Example Industries Limited',
            'email' => 'ADA@EXAMPLE.COM',
            'phone' => '+234 803 000 0000',
            'subject' => 'Accounting systems enquiry',
            'message' => 'We would like to discuss strengthening our accounting and reporting systems.',
            'consent' => true,
            'website' => '',
            'started_at' => now()->subSeconds(3)->timestamp,
        ]);

        $response->assertRedirect(route('contact.index'));

        $this->assertDatabaseHas('contact_messages', [
            'full_name' => 'Ada Okafor',
            'organisation' => 'Example Industries Limited',
            'email' => 'ada@example.com',
            'subject' => 'Accounting systems enquiry',
            'status' => 'new',
        ]);
    }

    public function test_contact_message_requires_essential_fields_and_consent(): void
    {
        $this->from(route('contact.index'))
            ->post(route('contact.store'), [
                'started_at' => now()->subSeconds(3)->timestamp,
            ])
            ->assertRedirect(route('contact.index'))
            ->assertSessionHasErrors([
                'full_name',
                'email',
                'subject',
                'message',
                'consent',
            ]);

        $this->assertDatabaseEmpty('contact_messages');
    }

    public function test_honeypot_rejects_automated_submissions(): void
    {
        $this->from(route('contact.index'))
            ->post(route('contact.store'), [
                'full_name' => 'Automated Sender',
                'email' => 'bot@example.com',
                'subject' => 'Automated message',
                'message' => 'This automated message should never be accepted into storage.',
                'consent' => true,
                'website' => 'https://spam.example.com',
                'started_at' => now()->subSeconds(3)->timestamp,
            ])
            ->assertRedirect(route('contact.index'))
            ->assertSessionHasErrors('website');

        $this->assertDatabaseEmpty('contact_messages');
    }
}
