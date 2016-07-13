<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGeneralConfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general-configs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('madv');
            $table->string('donvi');
            $table->string('diachi');
            $table->string('thutruong');
            $table->string('ketoan');
            $table->string('nguoilapbieu');
            $table->string('namhethong');
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
        Schema::drop('general-configs');
    }
}
