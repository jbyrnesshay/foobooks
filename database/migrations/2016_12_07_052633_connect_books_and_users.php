<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConnectBooksAndUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('books', function(Blueprint $table)  {
            #add a new INT field called user id that has to be unssigned
            $table->integer('user_id')->unsigned();

            #this field 'user_id' is a foreign key
            $table->foreign('user_id')->references('id')->on('users');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('books', function (Blueprint $table) {
         $table->dropForeign('books_user_id_foreign');
         $table->dropColumn('user_id');
    });
    }
}
