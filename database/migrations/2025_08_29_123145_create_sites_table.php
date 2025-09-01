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
        Schema::create('sites', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('domain')->nullable();
            $table->foreignId('template_id')->constrained()->onDelete('cascade');
            $table->json('selected_blocks'); // массив ID выбранных блоков
            $table->text('custom_settings')->nullable(); // дополнительные настройки
            $table->string('folder_path'); // путь к созданной папке сайта
            $table->string('status')->default('draft'); // draft, published, archived
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sites');
    }
};
