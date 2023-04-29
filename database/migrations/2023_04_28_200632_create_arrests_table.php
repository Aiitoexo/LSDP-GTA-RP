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
        Schema::create('arrests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('profile_in_mate_id');
            $table->foreign('profile_in_mate_id')->references('id')->on('profile_in_mates');
            $table->unsignedBigInteger('offense_id');
            $table->boolean('payed')->default(false);
            $table->foreign('offense_id')->references('id')->on('offenses');
            $table->boolean('has_conviction')->default(false);
            $table->string('created_at_conviction')->nullable();
            $table->boolean('fine_remove')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('arrests');
    }
};
