<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDmvitridatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dmvitridat', function (Blueprint $table) {
            $table->increments('id');
            $table->string('maso')->nullable();
            $table->string('magoc')->nullable();//mã số vị trí quản lý (mã cha)
            $table->string('macapdo')->nullable();
            $table->string('capdo')->nullable();//
            $table->text('vitri')->nullable();
            $table->string('hienthi')->nullable();//hiển thị số thứ tự trên báo cáo
            $table->date('ngaynhap')->nullable();
            $table->string('soqd')->nullable();
            $table->double('giadat')->default(0);
            $table->string('sapxep')->nullable();
            $table->string('ghichu')->nullable();
            $table->string('mahuyen')->nullable();//cho trường hợp huyện nào nhập giá của huyện đó
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
        Schema::drop('dmvitridat');
    }
}
