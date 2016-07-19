<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoaixnkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loaixnk', function (Blueprint $table) {
            $table->increments('id');
            $table->string('manhom',10);
            $table->string('mapnhom',10);
            $table->string('maloai',10);
            $table->string('tenloai');
            $table->string('masoloai');
            $table->string('masopnhom',10);
            $table->string('anhien');
            $table->string('sapxep');
            $table->string('theodoi');
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
        Schema::drop('loaixnk');
    }
}
