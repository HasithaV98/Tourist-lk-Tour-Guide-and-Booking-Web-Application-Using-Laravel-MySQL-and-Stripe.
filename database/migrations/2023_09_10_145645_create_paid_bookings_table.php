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
        Schema::create('paid_bookings', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('destination')->nullable();
            $table->string('date_time')->nullable();
            $table->string('request')->nullable();
            $table->string('price')->nullable();
            $table->string('person')->nullable();
            $table->string('day')->nullable();
            $table->string('user_id')->nullable();
            $table->string('location_id')->nullable();
            $table->string('payment_status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paid_bookings');
    }
};
