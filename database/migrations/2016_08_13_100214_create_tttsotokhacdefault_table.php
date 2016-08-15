<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTttsotokhacdefaultTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tttsotokhacdefault', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tents');
            $table->string('slts');
            $table->string('tskt');
            $table->string('tyleclcl');
            $table->string('nguyengia');
            $table->string('giatricl');
            $table->string('mahuyen');
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
        Schema::drop('tttsotokhacdefault');
    }
}
