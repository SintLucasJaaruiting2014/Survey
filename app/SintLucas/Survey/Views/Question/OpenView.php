<?php namespace SintLucas\Survey\Views\Question;

use Illuminate\Support\Facades\View;
use SintLucas\Survey\Question;

class OpenView {

	public function __construct(Question $question)
	{
		$this->question = $question;
	}

	public function render()
	{
		$view = View::make('survey.question.open');
		$view->id    = $this->question->id;
		$view->label = $this->question->label;

		return $view;
	}

	public function __toString()
	{
		return (string) $this->render();
	}

}