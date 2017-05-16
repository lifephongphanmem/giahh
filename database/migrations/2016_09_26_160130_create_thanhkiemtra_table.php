<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThanhkiemtraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thanhkiemtra', function (Blueprint $table) {
            $table->increments('id');
            $table->string('khvb')->nullable();
            $table->string('matkt')->nullable();
            $table->string('doankt')->nullable();
            $table->string('nam')->nullable();
            $table->date('thoidiem')->nullable();
            $table->string('noidung')->nullable();
            $table->string('tailieu')->nullable();
            $table->string('tailieu1')->nullable();
            $table->string('tailieu2')->nullable();
            $table->string('tailieu3')->nullable();
            $table->string('tailieu4')->nullable();
            $table->string('ip1')->nullable();
            $table->string('ip2')->nullable();
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
        Schema::drop('thanhkiemtra');
    }
}
