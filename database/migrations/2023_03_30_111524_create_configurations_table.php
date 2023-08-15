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
        Schema::create('configurations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('day_id')->constrained('days');
            $table->string('instance')->nullable();
            $table->string('token')->nullable();
            $table->string('row1')->nullable();
            $table->string('row2')->nullable();
            $table->string('type')->nullable();
            $table->text('confirm_subject')->nullable();
            $table->text('confirm_subject_en')->nullable();
            $table->text('confirm_content_en')->nullable();
            $table->text('apology_subject')->nullable();
            $table->text('apology_subject_en')->nullable();
            $table->text('apology_content')->nullable();
            $table->text('apology_content_en')->nullable();
            $table->text('under_study_subject')->nullable();
            $table->text('under_study_subject_en')->nullable();
            $table->text('under_study_content')->nullable();
            $table->text('under_study_content_en')->nullable();
            $table->text('waiting_content')->nullable();
            $table->text('waiting_content_en')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('configurations');
    }
};
