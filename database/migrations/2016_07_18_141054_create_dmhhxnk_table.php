<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDmhhxnkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dmhhxnk', function (Blueprint $table) {
            $table->increments('id');
            $table->string('masoloai')->nullable();
            $table->string('mahh')->nullable();
            $table->string('masp')->nullable();
            $table->string('tenhh')->nullable();
            $table->string('dacdiemkt')->nullable();
            $table->string('dvt')->nullable();
            $table->string('nsx')->nullable();
            $table->string('gc')->nullable();
            $table->string('thoidiem')->nullable();
            $table->string('anhien')->nullable();
            $table->string('sapxep')->nullable();
            $table->string('theodoi')->nullable();
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
        Schema::drop('dmhhxnk');
    }
}
