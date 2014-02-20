<?php namespace SintLucas\Survey\Views;

use Illuminate\Support\Facades\View;
use SintLucas\Core\AbstractView;
use SintLucas\School\ProgramCollection;
use SintLucas\Survey\Survey;
use SintLucas\Survey\Views\Question\QuestionView;

class SurveyView extends AbstractView {

	protected $survey;

	public function __construct(Survey $survey, ProgramCollection $programs)
	{
		$this->survey   = $survey;
		$this->programs = $programs;
	}

	public function render()
	{
		$view = View::make('survey.show');

		$view->name        = $this->survey->name;
		$view->slug        = $this->survey->slug;
		$view->description = $this->survey->description;
		$view->programs    = $this->programs->lists('name', 'id');
		$view->questions   = new QuestionView($this->survey->questions);

		return $view;
	}

}