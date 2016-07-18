<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDmthoidiemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dmthoidiem', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mathoidiem');
            $table->string('tenthoidiem');
            $table->string('tungay');
            $table->string('denngay');
            $table->string('nhom');
            $table->string('plbc');
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
        Schema::drop('dmthoidiem');
    }
}
