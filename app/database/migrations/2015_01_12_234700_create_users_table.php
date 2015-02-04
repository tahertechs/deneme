<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name',100);
			$table->string('username',50);
			$table->string('email')->unique();
			$table->string('password',60);
			$table->rememberToken();
			$table->boolean('confirmed')->default(0);
			$table->enum('role', array('admin', 'student','teacher'))->default('student');
			$table->text('bio')->nullable();
			
			$table->string('facebook')->nullable();
			$table->string('google')->nullable();
			$table->string('twitter')->nullable();
			$table->string('instagram')->nullable();
			$table->string('linkedin')->nullable();

			$table->integer('university_id');
			$table->integer('faculty_id');
			$table->integer('department_id');
			
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
		Schema::drop('users');
	}

}
