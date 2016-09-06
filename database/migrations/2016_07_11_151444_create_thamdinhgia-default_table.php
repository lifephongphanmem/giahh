<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThamdinhgiaDefaultTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thamdinhgia-default', function (Blueprint $table) {
            $table->increments('id');
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
            $table->string('gc');
            $table->string('mahuyen');
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
        Schema::drop('thamdinhgia-default');
    }
}
