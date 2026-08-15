<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('consultation_requests', function (Blueprint $table): void {
            $table->id();
            $table->string('full_name');
            $table->string('organisation');
            $table->string('job_title')->nullable();
            $table->string('email');
            $table->string('phone', 40);
            $table->string('location')->nullable();
            $table->string('service_key', 80);
            $table->string('industry')->nullable();
            $table->text('description');
            $table->string('preferred_contact_method', 24);
            $table->timestamp('preferred_at')->nullable();
            $table->string('attachment_disk', 32)->nullable();
            $table->string('attachment_path')->nullable();
            $table->string('attachment_original_name')->nullable();
            $table->string('status', 24)->default('new');
            $table->foreignId('assigned_to')->nullable()->constrained('users')->nullOnDelete();
            $table->text('internal_notes')->nullable();
            $table->timestamp('consent_at');
            $table->string('source_url', 2048)->nullable();
            $table->timestamps();

            $table->index(['status', 'created_at']);
            $table->index('service_key');
            $table->index('email');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('consultation_requests');
    }
};
