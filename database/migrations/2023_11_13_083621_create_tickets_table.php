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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('event_id');
            $table->decimal('total_price',7,0);
            $table->string('currency', 128)->nullable();
            $table->unsignedBigInteger('ticket_type_id')->nullable();
            $table->unsignedBigInteger('transportion_id')->nullable();
            $table->unsignedBigInteger('entertainment_id')->nullable();
            $table->unsignedBigInteger('airlines_counrty_id')->nullable();
            $table->string('shirt_size', 128)->nullable();
            $table->timestamps();

            // Indexes
            $table->index(['user_id', 'event_id']);

            // Foreign key constraints
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
            $table->foreign('airlines_counrty_id')->references('id')->on('airlines_countries')->onDelete('cascade');
            $table->foreign('transportion_id')->references('id')->on('transportions')->onDelete('cascade');
            $table->foreign('entertainment_id')->references('id')->on('entertainments')->onDelete('cascade');
            $table->foreign('ticket_type_id')->references('id')->on('ticket_type')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
