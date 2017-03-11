<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHsgiahanghoaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hsgiahanghoa', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mahs');
            $table->string('mathoidiem');
            $table->string('thitruong');
            $table->date('tgnhap');
            $table->string('maloaigia');
            $table->string('maloaihh');
            $table->string('phanloai');
            $table->string('nam');
            $table->string('thang');
            $table->string('quy');
            $table->string('mahuyen');
            $table->string('trangthai');
            $table->string('filedk');
            $table->string('hoso',20);
            $table->string('masopnhom',10);
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
        Schema::drop('hsgiahanghoa');
    }
}
