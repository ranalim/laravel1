<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSlugToUsers extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
     *  https://www.youtube.com/watch?v=XlPX3-lCkqU&index=26&list=PLwAKR305CRO-Q90J---jXVzbOd4CDRbVx
	 */
	public function up()
	{
		//
        Schema::table('posts', function($table){
            $table->string('slug')->unique()->after('body');
//            $table->index(['slug','title']);
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
        Schema::table('posts', function ($table){
            $table->dropColumn('slug');
        });
	}

}
