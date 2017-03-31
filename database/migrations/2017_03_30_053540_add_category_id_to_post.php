<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCategoryIdToPost extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
     *
     *  https://www.youtube.com/watch?v=oPc5ijQXq2s&index=37&list=PLwAKR305CRO-Q90J---jXVzbOd4CDRbVx
     *
	 */
	public function up()
	{
		//
        Schema::table('posts', function(Blueprint $table){
                                                                            // means just positive numbers || signed means negative + positive numbers
            $table->integer('category_id')->nullable()->after('slug')->unsigned();
//            $table->foreign('category_id')->references('id')->on('categories');
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
        Schema::table('posts', function (Blueprint $table){
            $table->dropColumn('category_id');
        });
	}

}
