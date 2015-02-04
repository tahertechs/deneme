<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('posts', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('author_id')->unsigned();
			$table->string('title');
			$table->string('slug');
			$table->string('description');
			$table->integer('university_id');
			$table->integer('faculty_id');
			$table->integer('department_id');
			$table->integer('course_id');
			$table->integer('sinif');
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
		Schema::drop('posts');
	}

}
