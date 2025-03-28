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
        Schema::create('dispatches', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ambulance_id');
            $table->unsignedBigInteger('patient_id');
            $table->timestamp('dispatch_time');
            $table->timestamp('arrival_time')->nullable();
            $table->enum('status', ['Pending', 'En Route', 'Completed', 'Cancelled']);
            $table->string('location');
            $table->foreign('ambulance_id')->references('id')->on('ambulances')->onDelete('cascade');
            $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dispatches');
    }
};
