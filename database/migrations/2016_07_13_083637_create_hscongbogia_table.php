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
            $table->string('sohs')->nullable();
            $table->string('plhs')->nullable();
            $table->string('sovbdn')->nullable();
            $table->string('sotbkl')->nullable();
            $table->string('vontx')->nullable();
            $table->string('vondt')->nullable();
            $table->string('nguonvon')->nullable();
            $table->date('ngaynhap')->nullable();
            $table->string('donvidn')->nullable();
            $table->string('diadiemcongbo')->nullable();
            $table->string('thang')->nullable();
            $table->string('quy')->nullable();
            $table->string('nam')->nullable();
            $table->string('mahuyen')->nullable();
            $table->string('mahs')->nullable();
            $table->string('trangthai')->nullable();
            $table->string('phanloai',20)->nullable();
            $table->string('filedk')->nullable();
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
        Schema::drop('hscongbogia');
    }
}
