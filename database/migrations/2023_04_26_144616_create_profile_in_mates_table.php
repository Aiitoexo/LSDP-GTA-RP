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
        Schema::create('profile_in_mates', function (Blueprint $table) {
            $table->id();
            $table->string('identity_number')->unique();
            $table->string('picture_url'); //TODO: unique
            $table->string('firstname');
            $table->string('lastname');
            $table->boolean('gender')->nullable();
            $table->string('birthday')->nullable();
            $table->integer('age')->nullable();
            $table->string('address')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profile_in_mates');
    }
};
