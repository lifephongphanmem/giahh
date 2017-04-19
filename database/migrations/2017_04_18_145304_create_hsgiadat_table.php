<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHsgiadatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hsgiadat', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mahs')->nullable();
            $table->string('maloaigia')->nullable();
            $table->date('tgnhap')->nullable();
            $table->date('tgapdung')->nullable();
            $table->string('nam')->nullable();
            $table->string('thang')->nullable();
            $table->string('quy')->nullable();
            $table->string('mahuyen')->nullable();
            $table->string('trangthai')->nullable();
            $table->string('phanloai')->nullable();
            $table->string('filedk')->nullable();
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
        Schema::drop('hsgiadat');
    }
}
