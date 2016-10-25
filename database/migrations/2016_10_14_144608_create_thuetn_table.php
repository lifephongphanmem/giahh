<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThuetnTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thuetn', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mahh');
            $table->string('masopnhom');
            $table->string('maloaihh');
            $table->string('maloaigia');
            $table->string('thitruong');
            $table->string('thoigian');
            $table->string('mathoidiem');
            $table->string('giatu');
            $table->string('giaden');
            $table->string('soluong');
            $table->string('nguontin');
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
        Schema::drop('thuetn');
    }
}
