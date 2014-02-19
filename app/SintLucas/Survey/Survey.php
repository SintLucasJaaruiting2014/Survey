<?php namespace SintLucas\Survey;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model {

	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'survey_surveys';

	/**
	 * Has many relation with the question model.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function questions()
	{
		return $this->hasMany('SintLucas\Survey\Question');
	}

}