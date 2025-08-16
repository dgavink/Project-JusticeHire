<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('appointments', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('client_id'); // Storing client ID
        $table->string('lawyer_name'); // Storing lawyer's name directly
        $table->dateTime('appointment_date_time');
        $table->enum('status', ['pending', 'accepted', 'rejected'])->default('pending'); // Status with default value 'pending'
        $table->timestamps();

        // Foreign key constraint for client_id
        $table->foreign('client_id')->references('user_id')->on('users')->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
