<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignComments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->bigInteger('user_id')->index()->unsigned() ;
            $table->bigInteger('post_id')->index()->unsigned() ;
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade') ;
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade')->onUpdate('cascade') ;
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->dropForeign(['post_id'] ) ;
            $table->dropColumn('post_id') ;
        });
    }
}
