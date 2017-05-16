<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDmloaihhTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dmloaihh', function (Blueprint $table) {
            $table->increments('id');
            $table->string('maloaihh')->nullable();
            $table->string('tenloaihh')->nullable();
            $table->string('gc')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('dmloaihh');
    }
}
