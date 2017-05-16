<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDmloaigiaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dmloaigia', function (Blueprint $table) {
            $table->increments('id');
            $table->string('maloaigia')->nullable();
            $table->string('tenloaigia')->nullable();
            $table->string('sapxep')->nullable();
            $table->string('gc')->nullable();
            $table->string('pl')->nullable();
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
        Schema::drop('dmloaigia');
    }
}
