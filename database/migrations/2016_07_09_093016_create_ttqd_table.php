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
            $table->string('khvb')->nullable();
            $table->string('mattqd')->nullable();
            $table->string('plttqd')->nullable();
            $table->string('nambh')->nullable();
            $table->string('level')->nullable();
            $table->string('dvbanhanh')->nullable();
            $table->date('ngaybh')->nullable();
            $table->date('ngayad')->nullable();
            $table->string('tieude')->nullable();
            $table->string('ghichu')->nullable();
            $table->string('tailieu')->nullable();
            $table->string('tailieu1')->nullable();
            $table->string('tailieu2')->nullable();
            $table->string('tailieu3')->nullable();
            $table->string('tailieu4')->nullable();
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
