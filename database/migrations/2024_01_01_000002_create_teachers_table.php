<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('role_en');
            $table->string('role_si')->nullable();
            $table->string('section')->default('both'); // international, preschool, both
            $table->string('subject_en')->nullable();
            $table->string('subject_si')->nullable();
            $table->text('qualifications_en')->nullable();
            $table->text('qualifications_si')->nullable();
            $table->text('bio_en')->nullable();
            $table->text('bio_si')->nullable();
            $table->string('photo')->nullable();
            $table->integer('sort_order')->default(0);
            $table->boolean('is_visible')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};
