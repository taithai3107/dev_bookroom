<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Room extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room', function (Blueprint $table) {
            $table->increments('room_id');
            $table->integer('type_id')->nullable()->unsigned();
            $table->string('room_name');
            $table->string('room_image');
            $table->string('room_price');
            $table->string('room_description');
            $table->string('room_status');
            $table->timestamps();
            $table->foreign('type_id')->references('type_id')->on('type')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('room');
    }
}
