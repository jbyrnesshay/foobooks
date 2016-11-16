<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConnectAuthorsAndBooks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('books', function (Blueprint $table) {
            $table->integer('purchases_link')->nullable();
            $table->dropColumn('author');

            #add new INT field called author_id that has to be unsigned ie positive
            $table->integer('author_id')->unsigned();

            #author_id is foreign key that connects to id field in authors table
            $table->foreign('author_id')->references('id')->on('authors');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('books', function(Blueprint $table) {

                $table->dropForeign('books_author_id_foreign');
                $table->dropColumn('author_id');
        });
        //
    }
}
