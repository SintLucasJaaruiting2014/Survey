<?php namespace SintLucas\Survey;

use Illuminate\Database\Eloquent\Model;

class Result extends Model {

	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'survey_results';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = array('program_id', 'survey_id', 'name');

	/**
	 * Belongs to relation with the program model.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function program()
	{
		return $this->belongsTo('SintLucas\School\Program');
	}

	/**
	 * Has many relation with the answer model.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function answers()
	{
		return $this->hasMany('SintLucas\Survey\Answer');
	}

}