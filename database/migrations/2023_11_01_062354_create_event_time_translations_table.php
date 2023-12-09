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
        Schema::create('event_time_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->Integer('event_time_id');
            $table->string('locale')->index();
            $table->string('title')->nullable();
            $table->string('desc_time');


    $table->unique(['event_time_id', 'locale']);
    $table->foreign('event_time_id')->references('id')->on('event_time')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_time_translations');
    }
};
