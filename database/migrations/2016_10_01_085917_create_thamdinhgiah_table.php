<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThamdinhgiahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thamdinhgiah', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mahs');
            $table->string('dataold');
            $table->string('datanew');
            $table->string('thaydoi');
            $table->string('thaotac');
            $table->string('name');
            $table->string('username');
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
        Schema::drop('thamdinhgiah');
    }
}
