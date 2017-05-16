<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCongbogiaDefaultTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('congbogia_default', function (Blueprint $table) {
            $table->increments('id');
            $table->text('tents')->nullable();
            $table->text('dacdiempl')->nullable();
            $table->text('thongsokt')->nullable();
            $table->string('nguongoc')->nullable();
            $table->string('dvt')->nullable();
            $table->string('sl')->nullable();
            $table->string('nguyengiadenghi')->nullable();
            $table->string('giadenghi')->nullable();
            $table->string('nguyengiathamdinh')->nullable();
            $table->string('giatritstd')->nullable();
            $table->string('giaththamdinh')->nullable();
            $table->string('giakththamdinh')->nullable();
            $table->string('gc')->nullable();
            $table->string('mahuyen')->nullable();
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
        Schema::drop('congbogia_default');
    }
}
