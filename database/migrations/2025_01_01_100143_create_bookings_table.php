<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id('booking_id');

            // Foreign key vehicle_id referencing "name" in vehicles
            $table->string('vehicle_name',100);

            // Foreign key driver_id referencing "name" in drivers
            $table->string('driver_name',100);

            // Foreign key created_by referencing "name" in users
            $table->string('created_by_name');

            // Foreign key approved_by_level1 referencing "name" in users
            $table->string('approved_by_level1_name');

            $table->string('position1');

            // Foreign key approved_by_level2 referencing "name" in users
            $table->string('approved_by_level2_name');

            $table->string('position2');

            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->date('start_date');
            $table->date('end_date');
            $table->text('purpose');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bookings');
    }
};
