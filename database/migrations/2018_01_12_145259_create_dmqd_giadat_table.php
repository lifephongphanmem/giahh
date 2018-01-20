<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDmqdGiadatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dmqd_giadat', function (Blueprint $table) {
            $table->increments('id');
            $table->string('soquyetdinh')->nullable();
            $table->string('sohieu')->nullable();
            $table->text('mota')->nullable();
            $table->date('ngayquyetdinh')->nullable();
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
        Schema::drop('dmvitridat');
    }
}
