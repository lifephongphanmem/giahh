<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHscongbogiaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hscongbogia', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sohs');
            $table->string('plhs');
            $table->string('sovbdn');
            $table->string('sotbkl');
            $table->string('vontx');
            $table->string('vondt');
            $table->string('nguonvon');
            $table->date('ngaynhap');
            $table->string('donvidn');
            $table->string('diadiemcongbo');
            $table->string('thang');
            $table->string('quy');
            $table->string('nam');
            $table->string('mahuyen');
            $table->string('mahs');
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
        Schema::drop('hscongbogia');
    }
}
