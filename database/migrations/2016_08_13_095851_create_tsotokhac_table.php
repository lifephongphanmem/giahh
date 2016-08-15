<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTsotokhacTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tsotokhac', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mahuyen');
            $table->date('ngaynhap');
            $table->string('nam');
            $table->string('thang');
            $table->string('quy');
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
        Schema::drop('tsotokhac');
    }
}
