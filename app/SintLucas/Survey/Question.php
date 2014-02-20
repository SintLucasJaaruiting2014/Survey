<?php namespace SintLucas\Survey;

use Illuminate\Database\Eloquent\Model;

class Question extends Model {

	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'survey_questions';

	/**
	 * Has many relation with the option model.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function answers()
	{
		return $this->hasMany('SintLucas\Survey\Answer');
	}

	/**
	 * Belongs to relation with the survey model.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function survey()
	{
		return $this->belongsTo('SintLucas\Survey\Survey');
	}

	/**
	 * Has many relation with the option model.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function options()
	{
		return $this->hasMany('SintLucas\Survey\Option');
	}

	/**
	 * Determine if the question is multiple choice.
	 *
	 * @return boolean
	 */
	public function isMultipleChoice()
	{
		return (bool) $this->multiple_choice;
	}

	/**
	 * Determine if the question is multiple choice.
	 *
	 * @return boolean
	 */
	public function customAllowed()
	{
		return (bool) $this->allow_custom;
	}

	/**
	 * Create a new Eloquent Collection instance.
	 *
	 * @param  array  $models
	 * @return \SintLucas\Survey\QuestionCollection
	 */
	public function newCollection(array $models = array())
	{
		return new QuestionCollection($models);
	}
}