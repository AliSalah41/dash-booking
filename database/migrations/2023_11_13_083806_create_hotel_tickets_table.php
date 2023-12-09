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
        Schema::create('hotel_tickets', function (Blueprint $table) {
            $table->id();
            $table->date('reservation_start');
            $table->date('reservation_end');
            $table->boolean('full_room');
            $table->decimal('hotel_price',7,0);
            $table->date('extra_night_from')->nullable();
            $table->date('extra_night_to')->nullable();
            $table->unsignedBigInteger('ticket_id');
            $table->unsignedBigInteger('hotel_id');
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('ticket_id')->references('id')->on('tickets')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('hotel_id')->references('id')->on('hotels')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotel_tickets');
    }
};
