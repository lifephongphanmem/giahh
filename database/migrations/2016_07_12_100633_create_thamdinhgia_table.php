<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThamdinhgiaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thamdinhgia', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mats');
            $table->text('tents');
            $table->text('dacdiempl');
            $table->text('thongsokt');
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
        Schema::drop('thamdinhgia');
    }
}
