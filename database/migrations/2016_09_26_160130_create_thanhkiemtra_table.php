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
            $table->string('khvb');
            $table->string('matkt');
            $table->string('doankt');
            $table->string('nam');
            $table->date('thoidiem');
            $table->string('noidung');
            $table->string('tailieu');
            $table->string('ip1');
            $table->string('ip2');
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
