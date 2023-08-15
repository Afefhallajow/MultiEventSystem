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
        Schema::create('days', function (Blueprint $table) {
            $table->id();
            $table->string('name');

            $table->string('name_en');
            $table->date('date');
            $table->string('time');
            $table->text('description');
            $table->text('description_en');
            $table->text('thanksMSG');
            $table->text('thanksMSG_en');

            $table->biginteger('place_id')->unsigned();
            $table->foreign('place_id')->references('id')->on('places')->onDelete('cascade');

            $table->string('image');
            $table->string('bg_image');
            $table->string('emailImage');
            $table->string('image_footer_print');
            $table->text('whatsappMSGContent')->nullable();
            $table->text('whatsappMSGlink')->nullable();
            $table->text('whatsInstance')->nullable();
            $table->text('whatsToken')->nullable();
            $table->string('info_link')->nullable();
            $table->string('whats_social')->nullable();
            $table->string('gmail_social')->nullable();
            $table->string('telegram_social')->nullable();
            $table->string('mail_social')->nullable();
            $table->text('map_url')->nullable();
            $table->string('color');
            $table->string('image_loader');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('days');
    }
};
