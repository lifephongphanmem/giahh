<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTtqdTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ttqd', function (Blueprint $table) {
            $table->increments('id');
            $table->string('khvb');
            $table->string('mattqd');
            $table->string('plttqd');
            $table->string('nambh');
            $table->string('level');
            $table->string('dvbanhanh');
            $table->string('ngaybh');
            $table->string('ngayad');
            $table->string('tieude');
            $table->string('ghichu');
            $table->string('tailieu');
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
        Schema::drop('ttqd');
    }
}
