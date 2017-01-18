<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserAndStundenplan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userandstundenplans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('userid')->unique();
            for ($i = 1; $i <= 48; $i++){
                $table->string('td'.$i)->nullable()->default(" ");
            }
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
