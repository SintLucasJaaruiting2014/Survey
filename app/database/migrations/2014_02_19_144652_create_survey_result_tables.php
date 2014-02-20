<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSurveyResultTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('survey_results', function($table)
		{
			$table->increments('id');
			$table->integer('program_id');
			$table->integer('survey_id');
			$table->string('name');
			$table->timestamps();
		});

		Schema::create('survey_answers', function($table)
		{
			$table->increments('id');
			$table->integer('result_id');
			$table->integer('question_id');
			$table->string('value');
			$table->boolean('multiple_choice');
			$table->boolean('custom');
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
		Schema::drop('survey_answers');
		Schema::drop('survey_results');
	}

}
