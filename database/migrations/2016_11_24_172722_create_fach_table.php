<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFachTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faches', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kuerzel');
            $table->string('name');
            $table->integer('sws');
            $table->integer('ects');
            $table->string('prof');

            $table->rememberToken();
            $table->timestamps();
        });    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
