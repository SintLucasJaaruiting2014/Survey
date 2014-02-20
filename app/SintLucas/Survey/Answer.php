<?php namespace SintLucas\Survey;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model {

	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'survey_answers';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = array(
		'custom',
		'multiple_choice',
		'question_id',
		'value'
	);

	/**
	 * Belongs to relation with the question model.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function question()
	{
		return $this->belongsTo('SintLucas\Survey\Question');
	}

	/**
	 * Belongs to relation with the result model.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function result()
	{
		return $this->belongsTo('SintLucas\Survey\Result');
	}

}