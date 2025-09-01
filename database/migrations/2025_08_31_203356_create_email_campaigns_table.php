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
        Schema::create('email_campaigns', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('subject')->nullable();
            $table->text('body_html')->nullable();
            $table->text('body_text')->nullable();
            $table->timestamp('scheduled_at')->nullable();
            $table->integer('sent_count')->default(0);
            $table->string('status')->default('draft'); // draft, scheduled, sent
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('email_campaigns');
    }
};
