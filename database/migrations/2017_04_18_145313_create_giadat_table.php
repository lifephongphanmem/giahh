<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHsgiadatctTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('giadat', function (Blueprint $table) {
            $table->increments('id');
            $table->string('maloaigia')->nullable();
            $table->string('mahs')->nullable();
            $table->string('khuvuc')->nullable();
            $table->double('vitri1')->nullable();
            $table->double('vitri2')->nullable();
            $table->double('vitri3')->nullable();
            $table->double('vitri4')->nullable();
            $table->double('vitri5')->nullable();
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
        Schema::drop('giadat');
    }
}
