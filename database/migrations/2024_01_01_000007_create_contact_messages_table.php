<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('contact_messages', function (Blueprint $table) {
            $table->id();
            $table->string('parent_name');
            $table->string('contact_number');
            $table->string('email')->nullable();
            $table->string('school_section'); // international, preschool
            $table->string('preferred_grade')->nullable();
            $table->text('message')->nullable();
            $table->string('lang')->default('en'); // which language was used
            $table->enum('status', ['new', 'contacted', 'closed'])->default('new');
            $table->text('internal_notes')->nullable();
            $table->ipAddress('ip_address')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contact_messages');
    }
};
