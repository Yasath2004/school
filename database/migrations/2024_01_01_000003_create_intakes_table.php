<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('intakes', function (Blueprint $table) {
            $table->id();
            $table->string('title_en');
            $table->string('title_si')->nullable();
            $table->text('description_en')->nullable();
            $table->text('description_si')->nullable();
            $table->string('section'); // international, preschool, both
            $table->string('grades_ages_en')->nullable();
            $table->string('grades_ages_si')->nullable();
            $table->date('application_open_date')->nullable();
            $table->date('application_close_date')->nullable();
            $table->date('intake_start_date')->nullable();
            $table->string('academic_year')->nullable();
            $table->enum('status', ['open', 'closed', 'hidden'])->default('open');
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('intakes');
    }
};
