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
            $table->string('maloaihh');
            $table->string('tenloaihh');
            $table->string('gc');
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
