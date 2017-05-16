<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHsgiahhxnkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hsgiahhxnk', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mathoidiem')->nullable();
            $table->string('thitruong')->nullable();
            $table->date('tgnhap')->nullable();
            $table->string('maloaigia')->nullable();
            $table->string('mahs')->nullable();
            $table->string('nam')->nullable();
            $table->string('thang')->nullable();
            $table->string('quy')->nullable();
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
        Schema::drop('hsgiahhxnk');
    }
}
