<?php namespace SintLucas\Survey;

use Illuminate\Database\Eloquent\Model;

class Option extends Model {

	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'survey_options';

	/**
	 * Belongs to relation with the question model.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function question()
	{
		return $this->belongsTo('SintLucas\Survey\Question');
	}

}