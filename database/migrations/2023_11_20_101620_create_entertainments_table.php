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
        Schema::create('entertainments', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description');
            $table->string('address');
            $table->string('start_dateTime');
            $table->string('end_dateTime');
            $table->decimal('price',7,0);
            $table->unsignedBigInteger('event_id');
            $table->timestamps();

            //foregin Key
            $table->foreign('event_id')->references('id')->on('events');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entertainments');
    }
};
