<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHsgiahhtnTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hsgiahhtn', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mahs');
            $table->string('mathoidiem');
            $table->string('thitruong');
            $table->date('tgnhap');
            $table->string('maloaigia');
            $table->string('maloaihh');
            $table->string('nam');
            $table->string('thang');
            $table->string('quy');
            $table->string('mahuyen');
            $table->string('trangthai');
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
        Schema::drop('hsgiahhtn');
    }
}
