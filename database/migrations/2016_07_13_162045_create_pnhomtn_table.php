<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePnhomtnTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pnhomtn', function (Blueprint $table) {
            $table->increments('id');
            $table->string('manhom',10);
            $table->string('mapnhom',10);
            $table->string('masopnhom',10);
            $table->text('tenpnhom');
            $table->string('theodoi');
            $table->string('sapxep');
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
        Schema::drop('pnhomtn');
    }
}
