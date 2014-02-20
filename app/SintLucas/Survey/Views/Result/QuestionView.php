<?php namespace SintLucas\Survey\Views\Result;

use Illuminate\Support\Facades\View;
use SintLucas\Survey\Question;
use SintLucas\Core\AbstractView;

class QuestionView extends AbstractView {

	public function __construct(Question $question, $results = array())
	{
		$this->question = $question;
		$this->results  = $results;
	}

	public function render()
	{
		$view = View::make('survey.result.question');

		$view->id       = $this->question->id;
		$view->question = $this->question->label;
		$view->options  = $this->question->options;
		$view->results  = $this->results;

		return $view;
	}

}