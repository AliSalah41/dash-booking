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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('user_id');
            // $table->unsignedBigInteger('friend_id');
            // $table->unsignedBigInteger('event_id');
            $table->string('number',256)->nullable();
            $table->string('type',256);
            $table->string('status',256);
            $table->timestamps();
        
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            // $table->foreign('friend_id')->references('id')->on('users')->onDelete('cascade');
            // $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
