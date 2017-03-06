<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGiathuetbTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('giathuetb', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mahs');
            $table->string('soqd');
            $table->date('ngaynhap');
            $table->string('maloai');
            $table->string('thang');
            $table->string('quy');
            $table->string('nam');
            $table->string('trangthai');
            $table->string('mahuyen');
            $table->string('filedk');
            $table->string('hoso',20);
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
        Schema::drop('giathuetb');
    }
}
