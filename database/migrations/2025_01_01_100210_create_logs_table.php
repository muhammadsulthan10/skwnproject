<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogsTable extends Migration
{
    public function up()
    {
        Schema::create('logs', function (Blueprint $table) {
            $table->id('log_id');
            $table->string('username')->constrained('users');
            $table->string('action', 255);
            $table->text('description')->nullable();
            $table->timestamp('timestamp')->useCurrent();
        });
    }

    public function down()
    {
        Schema::dropIfExists('logs');
    }
};
