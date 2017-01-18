<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserAndKalender extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userandkalenders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('userid');
            $table->integer('monat');

            for ($i = 1; $i <= 31; $i++){
                $table->string('tag'.$i)->nullable()->default($i);
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

    }
}
