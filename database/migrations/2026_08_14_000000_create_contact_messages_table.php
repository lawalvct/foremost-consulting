<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contact_messages', function (Blueprint $table): void {
            $table->id();
            $table->string('full_name');
            $table->string('organisation')->nullable();
            $table->string('email');
            $table->string('phone', 40)->nullable();
            $table->string('subject');
            $table->text('message');
            $table->string('status', 24)->default('new');
            $table->text('internal_notes')->nullable();
            $table->timestamp('consent_at');
            $table->timestamps();

            $table->index(['status', 'created_at']);
            $table->index('email');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contact_messages');
    }
};
