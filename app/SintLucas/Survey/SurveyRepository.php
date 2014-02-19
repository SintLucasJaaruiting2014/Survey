<?php namespace SintLucas\Survey;

class SurveyRepository {

	protected $option;
	protected $question;
	protected $survey;

	/**
	 * Create a new survey repository instance.
	 *
	 * @param \SintLucas\Survey\Survey   $survey
	 * @param \SintLucas\Survey\Question $question
	 * @param \SintLucas\Survey\Option   $option
	 */
	public function __construct(Survey $survey, Question $question, Option $option, Result $result, Answer $answer)
	{
		$this->answer   = $answer;
		$this->option   = $option;
		$this->question = $question;
		$this->result   = $result;
		$this->survey   = $survey;
	}

	/**
	 * Find a survey by slug.
	 *
	 * @param  string $slug
	 * @return \SintLucas\Survey\Survey|null
	 */
	public function findBySlug($slug)
	{
		$query = $this->survey->newQuery();

		return $query->with(array(
				'questions.options'
			))
			->where('slug', $slug)
			->first();
	}

	/**
	 * Insert the survey results into the database.
	 *
	 * @param  array $data
	 * @return \SintLucas\Survey\Result
	 */
	public function insertResult($surveyId, $data)
	{
		$result = $this->result->newInstance(array(
			'name'       => array_get($data, 'name'),
			'program_id' => array_get($data, 'program'),
			'survey_id'  => $surveyId
		));

		$result->save();

		$answers = $this->buildAnswerModels(array_get($data, 'question', array()));

		$result->answers()->saveMany($answers);
	}

	/**
	 * Create the answer models from the given question results.
	 *
	 * @param  array $questions
	 * @return array
	 */
	protected function buildAnswerModels($questions)
	{
		$answers = array();
		foreach($questions as $id => $value)
		{
			if(is_array($value))
			{
				foreach($value as $key => $option)
				{
					$answerData = array(
						'value'           => $option,
						'multiple_choice' => true,
						'custom'          => false
					);

					if($key == 'custom')
					{
						$answerData['custom'] = true;
					}

					$answers[] = $this->answer->newInstance($answerData);
				}
			}
			else
			{
				$answers[] = $this->answer->newInstance(array(
					'value'           => $value,
					'multiple_choice' => false,
					'custom'          => false
				));
			}
		}

		return $answers;
	}

}