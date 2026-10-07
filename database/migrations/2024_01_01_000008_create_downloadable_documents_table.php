<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('downloadable_documents', function (Blueprint $table) {
            $table->id();
            $table->string('title_en');
            $table->string('title_si')->nullable();
            $table->text('description_en')->nullable();
            $table->text('description_si')->nullable();
            $table->string('file_path');
            $table->string('file_type')->nullable(); // pdf, doc, etc
            $table->string('category')->default('general'); // prospectus, admissions, general
            $table->integer('sort_order')->default(0);
            $table->boolean('is_visible')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('downloadable_documents');
    }
};
