<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('gallery_albums', function (Blueprint $table) {
            $table->id();
            $table->string('title_en');
            $table->string('title_si')->nullable();
            $table->text('description_en')->nullable();
            $table->text('description_si')->nullable();
            $table->string('category'); // campus, classroom, activities, sports, events, celebrations, preschool, international
            $table->string('cover_image')->nullable();
            $table->integer('sort_order')->default(0);
            $table->boolean('is_visible')->default(true);
            $table->timestamps();
        });

        Schema::create('gallery_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('gallery_album_id')->constrained()->onDelete('cascade');
            $table->string('image_path');
            $table->string('caption_en')->nullable();
            $table->string('caption_si')->nullable();
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('gallery_images');
        Schema::dropIfExists('gallery_albums');
    }
};
