<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('things', function(Blueprint $table) {

            $table->increments('id');
            $table->timestamps();

            $table->string('first_name');
            $table->string('hair_color');
            $table->integer('age');
            $table->string('fave_song');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('things'); 
        }   
}
