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
        Schema::table('tickets', function (Blueprint $table) {
            $table->unsignedBigInteger('friend_ticket_id')->nullable();
            $table->unsignedBigInteger('edit_ticket')->nullable();
            $table->enum('status',['update','completed','not_completed'])->default('not_completed');

                        // Indexes
                        $table->index(['status']);

            $table->foreign('friend_ticket_id')->references('id')->on('tickets')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('edit_ticket')->references('id')->on('tickets')->onDelete('set null')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tickets', function (Blueprint $table) {
            
        });
    }
};
