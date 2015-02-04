<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSocialsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
    public function up()
    {
        Schema::create('socials', function($table)
        {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('username');
            $table->biginteger('uid')->unsigned();
            $table->string('access_token');
            $table->string('access_token_secret');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('socials');
    }

}
