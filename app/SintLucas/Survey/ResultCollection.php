<?php namespace SintLucas\Survey;

use Illuminate\Support\Collection;

class ResultCollection extends Collection {

	/**
	 * Get all the results that belongs to the given question id.
	 *
	 * @param  int $id
	 * @return \SintLucas\Survey\ResultCollection
	 */
	public function getResultsByQuestion($id)
	{
		$results = array();
		foreach($this->items as $result)
		{
			if((int) $id == (int) $result->question_id)
			{
				$results[(int) $result->option_id] = $result->count;
			}
		}

		return $results;
	}

}