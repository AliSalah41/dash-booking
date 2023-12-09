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
        Schema::create('event_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->Integer('event_id');
            $table->string('locale')->index();
            $table->string('title')->nullable();
            $table->string('description');


    $table->unique(['event_id', 'locale']);
    $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
            // $table->timestamps();
        });
     
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_translations');
    }
};
