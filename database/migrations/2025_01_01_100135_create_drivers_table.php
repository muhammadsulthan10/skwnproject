<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDriversTable extends Migration
{
    public function up()
    {
        Schema::create('drivers', function (Blueprint $table) {
            $table->id('driver_id');
            $table->string('driver_name', 100);
            $table->string('phone', 15)->unique();
            $table->string('license_number', 50)->unique();
            $table->string('image_url');
            $table->enum('status', ['available', 'assigned', 'off'])->default('available');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('drivers');
    }
};