<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePnhomxnkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pnhomxnk', function (Blueprint $table) {
            $table->increments('id');
            $table->string('manhom',10);
            $table->string('mapnhom',10);
            $table->string('masopnhom',10);
            $table->string('tenpnhom');
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
        Schema::drop('pnhomxnk');
    }
}
