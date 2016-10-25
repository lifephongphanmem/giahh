<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDmthuetnTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dmthuetn', function (Blueprint $table) {
            $table->increments('id');
            $table->string('masopnhom');
            $table->string('mahh');
            $table->string('masp');
            $table->string('tenhh');
            $table->string('dacdiemkt');
            $table->string('dvt');
            $table->string('gc');
            $table->string('thoidiem');
            $table->string('sapxep');
            $table->string('theodoi');
            $table->string('thuoctn');//xem tài nguyên thuộc tài nguyên nào trong bảng do danh mục củ chuối
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
        Schema::drop('dmthuetn');
    }
}
