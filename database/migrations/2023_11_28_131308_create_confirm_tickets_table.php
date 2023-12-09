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
        Schema::create('confirm_tickets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('event_id');

            $table->unsignedBigInteger('transportion_id')->nullable();
            $table->unsignedBigInteger('entertainment_id')->nullable();
            $table->unsignedBigInteger('airlines_counrty_id')->nullable();
            $table->unsignedBigInteger('ticket_id')->nullable();
            $table->unsignedBigInteger('hotel_id')->nullable();
            $table->timestamps();


            $table->index([ 'event_id','ticket_id','hotel_id']);

            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
            $table->foreign('transportion_id')->references('id')->on('transportions')->onDelete('cascade');
            $table->foreign('entertainment_id')->references('id')->on('entertainments')->onDelete('cascade');
            $table->foreign('airlines_counrty_id')->references('id')->on('airlines_countries')->onDelete('cascade');
            $table->foreign('ticket_id')->references('id')->on('tickets')->onDelete('cascade');
            $table->foreign('hotel_id')->references('id')->on('hotels')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('confirm_tickets');
    }
};
