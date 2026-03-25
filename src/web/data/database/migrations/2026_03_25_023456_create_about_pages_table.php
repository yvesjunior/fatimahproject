<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('about_pages', function (Blueprint $table) {
            $table->id();
            // Why Choose Us
            $table->string('why_subtitle')->default('Why Choose Us');
            $table->string('why_heading')->default('Trusted non profit donation center');
            $table->text('mission_text');
            $table->text('vision_text');
            $table->string('video_url')->nullable();
            // Programs
            $table->json('programs')->nullable();
            // Get Involved
            $table->string('involved_subtitle')->default('Get Involved');
            $table->string('involved_heading')->default('Support Our Cause');
            $table->text('involved_description')->nullable();
            $table->integer('raised_amount')->default(25000);
            $table->string('raised_label')->default('Raised by 350 people in one year');
            $table->integer('volunteer_count')->default(30);
            $table->string('volunteer_label')->default('Volunteers are available to help you');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('about_pages');
    }
};
