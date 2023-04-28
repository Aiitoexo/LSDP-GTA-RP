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
        Schema::create('comment_profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('profile_in_mate_id');
            $table->foreign('profile_in_mate_id')->references('id')->on('profile_in_mates');
            $table->text('content');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comment_profiles');
    }
};
