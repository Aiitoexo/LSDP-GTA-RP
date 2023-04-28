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
        Schema::create('actions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('offense_id');
            $table->foreign('offense_id')->references('id')->on('offenses');
            $table->string('content')->nullable();
            $table->integer('gav')->nullable();
            $table->boolean('post_search')->default(false);
            $table->integer('federal')->nullable();
            $table->boolean('federal_for_life')->default(false);
            $table->boolean('visa')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('actions');
    }
};
