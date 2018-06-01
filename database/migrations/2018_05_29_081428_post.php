<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Post extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    Schema::create('posts', function (Blueprint $table) {
		    $table->increments('id');
		    $table->string('title');
		    $table->longText('content');
		    $table->integer('user_id')->unsigned();
		    $table->integer('category_id')->unsigned();
		    $table->integer('published')->default(1);
		    $table->string('image');
		    $table->integer('count_view')->unsigned()->default(0);
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
	    Schema::dropIfExists('posts');
    }
}
