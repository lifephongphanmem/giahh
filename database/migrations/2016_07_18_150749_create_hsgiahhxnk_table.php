<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHsgiahhxnkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hsgiahhxnk', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mathoidiem');
            $table->string('thitruong');
            $table->date('tgnhap');
            $table->string('maloaigia');
            $table->string('mahs');
            $table->string('nam');
            $table->string('thang');
            $table->string('quy');
            $table->string('mahuyen');
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
        Schema::drop('hsgiahhxnk');
    }
}
