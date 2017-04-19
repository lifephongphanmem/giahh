<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDmloaidatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dmloaidat', function (Blueprint $table) {
            $table->increments('id');
            $table->string('maloaigia');
            $table->string('loaidat')->nullable();
            $table->text('khuvuc')->nullable();
            $table->text('vitri')->nullable();
            $table->string('sapxep')->nullable();
            $table->string('ghichu')->nullable();
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
        Schema::drop('dmloaidat');
    }
}
