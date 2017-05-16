<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHsthuetnTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hsthuetn', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mahs')->nullable();
            $table->string('mathoidiem')->nullable();
            $table->string('thitruong')->nullable();
            $table->date('tgnhap')->nullable();
            $table->string('maloaigia')->nullable();
            $table->string('maloaihh')->nullable();
            $table->string('phanloai')->nullable();
            $table->string('nam')->nullable();
            $table->string('thang')->nullable();
            $table->string('quy')->nullable();
            $table->string('mahuyen')->nullable();
            $table->string('trangthai')->nullable();
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
        Schema::drop('hsthuetn');
    }
}
