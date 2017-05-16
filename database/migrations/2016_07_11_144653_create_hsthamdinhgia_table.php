<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHsthamdinhgiaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hsthamdinhgia', function (Blueprint $table) {
            $table->increments('id');
            $table->string('diadiem')->nullable();
            $table->date('thoidiem')->nullable();
            $table->string('ppthamdinh')->nullable();
            $table->string('mucdich')->nullable();
            $table->string('dvyeucau')->nullable();
            $table->date('thoihan')->nullable();
            $table->string('sotbkl')->nullable();
            $table->string('hosotdgia')->nullable();
            $table->string('nguonvon')->nullable();
            $table->string('phanloai',20)->nullable();
            $table->string('trangthai')->nullable();
            $table->string('thang')->nullable();
            $table->string('quy')->nullable();
            $table->string('nam')->nullable();
            $table->string('mahuyen')->nullable();
            $table->string('mahs')->nullable();
            $table->string('thuevat')->nullable();
            $table->string('songaykq')->nullable();
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
        Schema::drop('hsthamdinhgia');
    }
}
