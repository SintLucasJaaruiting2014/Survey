<?php namespace SintLucas\Survey;

use Illuminate\Database\DatabaseManager;

class SurveyRepository {

	protected $answer;
	protected $db;
	protected $option;
	protected $question;
	protected $result;
	protected $survey;

	/**
	 * Create a new survey repository instance.
	 *
	 * @param \SintLucas\Survey\Survey   $survey
	 * @param \SintLucas\Survey\Question $question
	 * @param \SintLucas\Survey\Option   $option
	 */
	public function __construct(DatabaseManager $db, Survey $survey, Question $question, Option $option, Result $result, Answer $answer)
	{
		$this->answer   = $answer;
		$this->db       = $db;
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
	 * Get the results by slug.
	 *
	 * @param  string $slug
	 * @return \SintLucas\Survey\ResultCollection
	 */
	public function getResults($id)
	{
		$answer   = $this->answer->getTable();
		$option   = $this->option->getTable();
		$question = $this->question->getTable();
		$result   = $this->result->getTable();
		$survey   = $this->survey->getTable();

		$results = $this->db->table($survey)
			->select(array(
				$this->db->raw("$question.id as question_id"),
				$this->db->raw("$option.id as option_id"),
				$this->db->raw("count($option.label) as count")
			))
			->join($question, "$survey.id", '=', "$question.survey_id")
			->join($option, "$question.id", '=', "$option.question_id")
			->join($answer, "$option.id", '=', "$answer.value")
			->where("$survey.id", '=', $id)
			->where("$answer.custom", '=', 0)
			->where("$question.multiple_choice", '=', 1)
			->groupBy("$answer.value")
			->orderBy("$question.id")
			->get();

		return new ResultCollection($results);
		// SELECT q.label, o.label, count(a.value) FROM survey_surveys s
		// join survey_questions q on s.id = q.survey_id
		// join survey_options o on q.id = o.question_id
		// join survey_answers a on o.id = a.value
		// where q.multiple_choice = 1
		// and a.custom = 0
		// group by a.value
		// order by q.id
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
						'question_id'     => $id,
						'value'           => $option,
						'multiple_choice' => true,
						'custom'          => false
					);

					if($key === 'custom')
					{
						$answerData['custom'] = true;
					}

					$answers[] = $this->answer->newInstance($answerData);
				}
			}
			else
			{
				$answers[] = $this->answer->newInstance(array(
					'question_id'     => $id,
					'value'           => $value,
					'multiple_choice' => false,
					'custom'          => false
				));
			}
		}

		return $answers;
	}

}