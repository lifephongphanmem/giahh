<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCongbogiaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('congbogia', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mats');
            $table->string('tents');
            $table->string('dacdiempl');
            $table->string('thongsokt');
            $table->string('nguongoc');
            $table->string('dvt');
            $table->string('sl');
            $table->string('nguyengiadenghi');
            $table->string('giadenghi');
            $table->string('nguyengiathamdinh');
            $table->string('giatritstd');
            $table->string('giaththamdinh');
            $table->string('giakththamdinh');
            $table->string('gc');
            $table->string('mahs');
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
        Schema::drop('congbogia');
    }
}
