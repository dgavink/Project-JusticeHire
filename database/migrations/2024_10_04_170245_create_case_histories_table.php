<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateCaseHistoriesTable extends Migration
{
    public function up()
    {
        Schema::create('case_histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('case_id'); // Case ID from the cases table
            $table->string('file_attachment'); // File attachment
            $table->timestamps();

            // Foreign key constraint for case_id
            $table->foreign('case_id')->references('id')->on('cases')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('case_histories');
    }
}