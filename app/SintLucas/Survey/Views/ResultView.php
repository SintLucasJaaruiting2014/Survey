<?php namespace SintLucas\Survey\Views;

use Illuminate\Support\Facades\View;
use SintLucas\Core\AbstractView;
use SintLucas\School\ProgramCollection;
use SintLucas\Survey\ResultCollection;
use SintLucas\Survey\Survey;
use SintLucas\Survey\Views\Result\QuestionView;

class ResultView extends AbstractView {

	public function __construct(Survey $survey, ResultCollection $results, ProgramCollection $programs)
	{
		$this->results  = $results;
		$this->survey   = $survey;
		$this->programs = $programs;
	}

	public function render()
	{
		$view = View::make('survey.result.show');

		$view->count     = $this->survey->results->count();
		$view->programs  = $this->programs->lists('name', 'id');

		$view->questions = array();
		foreach($this->survey->questions as $question)
		{
			$results = $this->results->getResultsByQuestion($question->id);

			$view->questions[] = new QuestionView($question, $results);
		}

		return $view;
	}

}