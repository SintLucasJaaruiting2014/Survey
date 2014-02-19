<?php namespace SintLucas\Survey\Views;

use Illuminate\Support\Facades\View;
use SintLucas\School\ProgramCollection;
use SintLucas\Survey\Survey;

class SurveyView {

	protected $survey;

	public function __construct(Survey $survey, ProgramCollection $programs)
	{
		$this->survey   = $survey;
		$this->programs = $programs;
	}

	public function render()
	{
		$view = View::make('survey.index');

		$view->name        = $this->survey->name;
		$view->description = $this->survey->description;
		$view->programs    = $this->programs->lists('name', 'id');
		$view->questions   = new QuestionView($this->survey->questions);

		return $view;
	}

	public function __toString()
	{
		return (string) $this->render();
	}

}