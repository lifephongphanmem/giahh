<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTttsotokhacTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tttsotokhac', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tents')->nullable();
            $table->string('slts')->nullable();
            $table->string('tskt')->nullable();
            $table->string('tyleclcl')->nullable();
            $table->string('nguyengia')->nullable();
            $table->string('giatricl')->nullable();
            $table->string('mahs')->nullable();
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
        Schema::drop('tttsotokhac');
    }
}
