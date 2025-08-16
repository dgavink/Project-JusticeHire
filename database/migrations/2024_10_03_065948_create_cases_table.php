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
        Schema::create('cases', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Assuming you're storing client data based on logged-in user
            $table->string('lawyer_name');
            $table->string('client_name');
            $table->string('holder_name');
            $table->string('nic');
            $table->string('contact');
            $table->string('case_category');
            $table->string('court_type');
            $table->string('venue');
            $table->dateTime('case_date_time');
            $table->string('file_attachment')->nullable(); // Store file names
            $table->timestamps();
    
            // Foreign key for user
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cases');
    }
};
