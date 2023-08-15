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
        Schema::create('inviteds', function (Blueprint $table) {
            $table->id();
       $table->string('name');
            $table->string('mobile');
            $table->string('id_number');
            $table->string('age');
            $table->string('area');
            $table->string('gender');
            $table->string('work');
            $table->foreignId('day_id')->constrained('days');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inviteds');
    }
};
