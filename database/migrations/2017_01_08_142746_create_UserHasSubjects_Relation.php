<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserHasSubjectsRelation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userhassubjectsrelations', function (Blueprint $table) {
           $table->increments('id');
            $table->integer('userid')->nullable();
            $table->integer('subjectid');
            $table->float('note')->nullable();
            $table->float('meinAufwand')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->unique( array('userid', 'subjectid') );
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
