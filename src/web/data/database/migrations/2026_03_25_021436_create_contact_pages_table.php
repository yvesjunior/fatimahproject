<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contact_pages', function (Blueprint $table) {
            $table->id();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->text('address')->nullable();
            $table->string('map_embed_url')->nullable();
            $table->integer('years_experience')->default(5);
            $table->integer('volunteer_count')->default(30);
            $table->integer('projects_completed')->default(100);
            $table->string('form_subtitle')->default('Need help');
            $table->string('form_title')->default('Get In touch');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contact_pages');
    }
};
