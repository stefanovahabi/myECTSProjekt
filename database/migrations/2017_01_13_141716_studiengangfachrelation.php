<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Studiengangfachrelation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('studiengangfachrelations', function (Blueprint $table) {
           $table->increments('id');
            $table->integer('studiengang');
            $table->integer('fach');
            $table->rememberToken();
            $table->timestamps();
            $table->unique( array('id', 'studiengang') );

        });
    }
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
