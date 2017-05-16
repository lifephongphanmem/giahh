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
            $table->string('manhom',10)->nullable();
            $table->string('mapnhom',10)->nullable();
            $table->string('masopnhom',10)->nullable();
            $table->text('tenpnhom')->nullable();
            $table->string('theodoi')->nullable();
            $table->string('sapxep')->nullable();
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
