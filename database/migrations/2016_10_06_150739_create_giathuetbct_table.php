<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGiathuetbctTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('giathuetbct', function (Blueprint $table) {
            $table->increments('id');
            $table->string('maloai');
            $table->string('maso');
            $table->string('tenhieu');
            $table->string('thongsokt');
            $table->string('dungtich');
            $table->string('nuocsx');
            $table->string('giaht');
            $table->string('giamoi');
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
        Schema::drop('giathuetbct');
    }
}
