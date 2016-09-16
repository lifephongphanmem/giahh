<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNhomtn55Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nhomtn55', function (Blueprint $table) {
            $table->increments('id');
            $table->string('manhom',10);
            $table->string('tennhom');
            $table->string('sapxep');
            $table->string('theodoi');
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
        Schema::drop('nhomtn55');
    }
}
