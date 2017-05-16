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
            $table->string('mathoidiem')->nullable();
            $table->string('tenthoidiem')->nullable();
            $table->string('tungay')->nullable();
            $table->string('denngay')->nullable();
            $table->string('nhom')->nullable();
            $table->string('plbc')->nullable();
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
