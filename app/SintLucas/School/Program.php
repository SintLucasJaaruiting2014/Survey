<?php namespace SintLucas\School;

use Illuminate\Database\Eloquent\Model;

class Program extends Model {

	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'school_programs';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = array('name');

	/**
	 * Create a new Eloquent Collection instance.
	 *
	 * @param  array  $models
	 * @return \SintLucas\Survey\QuestionCollection
	 */
	public function newCollection(array $models = array())
	{
		return new ProgramCollection($models);
	}
}