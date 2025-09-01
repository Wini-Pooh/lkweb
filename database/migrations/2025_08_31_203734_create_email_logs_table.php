<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('email_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('campaign_id')->nullable()->constrained('email_campaigns')->nullOnDelete();
            $table->foreignId('subscriber_id')->nullable()->constrained('email_subscribers')->nullOnDelete();
            $table->string('email');
            $table->string('status')->default('pending'); // pending, sent, failed
            $table->text('error')->nullable();
            $table->timestamp('sent_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('email_logs');
    }
};
