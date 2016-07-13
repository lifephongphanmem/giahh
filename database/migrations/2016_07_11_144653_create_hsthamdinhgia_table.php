<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHsthamdinhgiaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hsthamdinhgia', function (Blueprint $table) {
            $table->increments('id');
            $table->string('diadiem');
            $table->date('thoidiem');
            $table->string('ppthamdinh');
            $table->string('mucdich');
            $table->string('dvyeucau');
            $table->date('thoihan');
            $table->string('sotbkl');
            $table->string('hosotdgia');
            $table->string('thang');
            $table->string('quy');
            $table->string('nam');
            $table->string('mahuyen');
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
        Schema::drop('hsthamdinhgia');
    }
}
