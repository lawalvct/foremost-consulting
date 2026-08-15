<?php

namespace Tests\Feature;

use App\Models\ConsultationRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Inertia\Testing\AssertableInertia as Assert;
use Tests\TestCase;

class ConsultationPageTest extends TestCase
{
    use RefreshDatabase;

    public function test_consultation_page_is_available_with_approved_options(): void
    {
        $this->get(route('consultation.index'))
            ->assertOk()
            ->assertInertia(fn (Assert $page) => $page
                ->component('Public/Consultation')
                ->has('serviceOptions', 9)
                ->has('industryOptions', 9));
    }

    public function test_a_valid_consultation_request_is_stored(): void
    {
        $response = $this->from(route('consultation.index'))
            ->post(route('consultation.store'), $this->validPayload());

        $response->assertRedirect(route('consultation.index'));

        $this->assertDatabaseHas('consultation_requests', [
            'full_name' => 'Ada Okafor',
            'organisation' => 'Example Industries Limited',
            'email' => 'ada@example.com',
            'service_key' => 'accounting-technology',
            'preferred_contact_method' => 'email',
            'status' => 'new',
        ]);
    }

    public function test_an_approved_attachment_is_stored_privately(): void
    {
        Storage::fake('local');

        $response = $this->from(route('consultation.index'))
            ->post(route('consultation.store'), [
                ...$this->validPayload(),
                'attachment' => UploadedFile::fake()->create(
                    'systems-brief.pdf',
                    120,
                    'application/pdf',
                ),
            ]);

        $response->assertRedirect(route('consultation.index'));

        $consultation = ConsultationRequest::query()->sole();

        $this->assertSame('local', $consultation->attachment_disk);
        $this->assertSame('systems-brief.pdf', $consultation->attachment_original_name);
        $this->assertNotNull($consultation->attachment_path);
        Storage::disk('local')->assertExists($consultation->attachment_path);
    }

    public function test_an_unapproved_attachment_is_rejected(): void
    {
        Storage::fake('local');

        $this->from(route('consultation.index'))
            ->post(route('consultation.store'), [
                ...$this->validPayload(),
                'attachment' => UploadedFile::fake()->create(
                    'unsafe.exe',
                    20,
                    'application/x-msdownload',
                ),
            ])
            ->assertRedirect(route('consultation.index'))
            ->assertSessionHasErrors('attachment');

        $this->assertDatabaseEmpty('consultation_requests');
    }

    public function test_honeypot_rejects_automated_consultation_requests(): void
    {
        $this->from(route('consultation.index'))
            ->post(route('consultation.store'), [
                ...$this->validPayload(),
                'website' => 'https://spam.example.com',
            ])
            ->assertRedirect(route('consultation.index'))
            ->assertSessionHasErrors('website');

        $this->assertDatabaseEmpty('consultation_requests');
    }

    /**
     * @return array<string, mixed>
     */
    private function validPayload(): array
    {
        return [
            'full_name' => 'Ada Okafor',
            'organisation' => 'Example Industries Limited',
            'job_title' => 'Finance Manager',
            'email' => 'ADA@EXAMPLE.COM',
            'phone' => '+234 803 000 0000',
            'location' => 'Abeokuta, Ogun State',
            'service_key' => 'accounting-technology',
            'industry' => 'Manufacturing',
            'description' => 'We would like to discuss improving our accounting workflows, reporting controls and team adoption.',
            'preferred_contact_method' => 'email',
            'preferred_at' => now()->addDay()->format('Y-m-d H:i:s'),
            'consent' => true,
            'website' => '',
            'started_at' => now()->subSeconds(4)->timestamp,
        ];
    }
}
