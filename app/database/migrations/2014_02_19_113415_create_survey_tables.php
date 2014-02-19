<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSurveyTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('survey_surveys', function($table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('slug');
			$table->timestamps();
		});

		Schema::create('survey_questions', function($table)
		{
			$table->increments('id');
			$table->integer('survey_id')->unsigned();
			$table->string('label');
			$table->boolean('multiple_choice');
			$table->boolean('allow_custom');
			$table->timestamps();
		});

		Schema::create('survey_options', function($table)
		{
			$table->increments('id');
			$table->integer('question_id')->unsigned();
			$table->string('label');
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
		Schema::drop('survey_options');
		Schema::drop('survey_questions');
		Schema::drop('survey_surveys');
	}

}
