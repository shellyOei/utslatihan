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
            $table->id()->primary();
            $table->unsignedBigInteger('flight_id');
            $table->string('passenger_name');
            $table->string('passenger_phone', 14);
            $table->string('seat_number', 3); 
            $table->boolean('is_boarding')->default(0); //def false
            $table->dateTime('boarding_time')->nullable(); //def false
            
            $table->foreign('flight_id')->references('id')->on('flights')->onDelete('cascade');
            $table->timestamps();
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
