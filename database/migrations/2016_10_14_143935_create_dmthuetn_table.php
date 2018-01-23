<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDmthuetnTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dmthuetn', function (Blueprint $table) {
            $table->increments('id');
            $table->string('masopnhom')->nullable();
            $table->string('manhom')->nullable();
            $table->string('mahh')->nullable();
            $table->string('magoc')->nullable();//mã số vị trí quản lý (mã cha)
            $table->string('macapdo')->nullable();
            $table->string('capdo')->nullable();//
            $table->string('masp')->nullable();
            $table->string('tenhh')->nullable();
            $table->string('dacdiemkt')->nullable();
            $table->string('dvt')->nullable();
            $table->double('giatu')->default(0);
            $table->double('giaden')->default(0);
            $table->string('gc')->nullable();
            $table->string('thoidiem')->nullable();
            $table->string('sapxep')->nullable();
            $table->string('theodoi')->nullable();
            $table->string('thuoctn')->nullable();//xem tài nguyên thuộc tài nguyên nào trong bảng do danh mục củ chuối
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
        Schema::drop('dmthuetn');
    }
}
