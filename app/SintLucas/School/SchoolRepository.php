<?php namespace SintLucas\School;

class SchoolRepository {

	protected $location;
	protected $program;

	/**
	 * Create a new program repository instance.
	 *
	 * @param \SintLucas\School\Program  $program
	 * @param \SintLucas\School\Location $location
	 */
	public function __construct(Program $program, Location $location)
	{
		$this->location = $location;
		$this->program  = $program;
	}

	/**
	 * Get all school programs.
	 *
	 * @return \Illuminate\Database\Eloquent\Collection
	 */
	public function getPrograms()
	{
		$query = $this->program->newQuery();

		return $query->get();
	}

}