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
            $table->increments('id')->nullable();
            $table->string('mahs')->nullable();
            $table->string('soqd')->nullable();
            $table->date('ngaynhap')->nullable();
            $table->string('maloai')->nullable();
            $table->string('thang')->nullable();
            $table->string('quy')->nullable();
            $table->string('nam')->nullable();
            $table->string('trangthai')->nullable();
            $table->string('mahuyen')->nullable();
            $table->string('filedk')->nullable();
            $table->string('hoso',20)->nullable();
            $table->string('filedk1')->nullable();
            $table->string('filedk2')->nullable();
            $table->string('filedk3')->nullable();
            $table->string('filedk4')->nullable();
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
