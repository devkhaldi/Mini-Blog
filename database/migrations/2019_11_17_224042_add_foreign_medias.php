<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignMedias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('medias', function (Blueprint $table) {
            $table->bigInteger('user_id')->unsigned() ;
            $table->bigInteger('post_id')->unsigned() ;
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
        Schema::table('medias', function (Blueprint $table) {
            $table->dropForeign(['post_id'] ) ;
            $table->dropColumn('post_id') ;
        });
    }
}
