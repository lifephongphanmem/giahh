<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGiathuedatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('giathuedat', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mahs')->nullable();
            $table->string('maso')->nullable();//mã vị trí đất
            $table->string('tendonvi')->nullable();
            $table->string('mucdich')->nullable();
            $table->date('ngaytu')->nullable();
            $table->date('ngayden')->nullable();
            $table->double('giagoc')->default(0);//giá theo danh mục vị trí đất
            $table->double('giathuedat')->default(0);
            $table->string('trangthai')->nullable();
            $table->string('thang')->nullable();
            $table->string('quy')->nullable();
            $table->string('nam')->nullable();
            $table->string('mahuyen')->nullable();
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
        Schema::drop('giathuedat');
    }
}
