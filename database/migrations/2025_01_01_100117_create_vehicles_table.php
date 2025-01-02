<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesTable extends Migration
{
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id('vehicle_id');
            $table->string('vehicle_name', 100);
            $table->enum('vehicle_type', ['passenger', 'cargo']);
            $table->string('license_plate', 20)->unique();
            $table->enum('ownership', ['owned', 'rented']);
            $table->date('service_schedule');
            $table->enum('status', ['available', 'in_use', 'maintenance'])->default('available');
            $table->float('fuel_consumption', 8, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('vehicles');
    }
};

