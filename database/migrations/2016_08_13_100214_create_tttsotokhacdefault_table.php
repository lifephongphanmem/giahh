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
            $table->string('tents')->nullable();
            $table->string('slts')->nullable();
            $table->string('tskt')->nullable();
            $table->string('tyleclcl')->nullable();
            $table->string('nguyengia')->nullable();
            $table->string('giatricl')->nullable();
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
        Schema::drop('tttsotokhacdefault');
    }
}
