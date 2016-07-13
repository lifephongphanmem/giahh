<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTtphongbanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ttphongban', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ma')->unique();
            $table->string('ten')->nullable();
            $table->string('diachi')->nullable();
            $table->string('dienthoai')->nullable();
            $table->string('fax')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();
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
        Schema::drop('ttphongban');
    }
}
