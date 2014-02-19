<?php namespace SintLucas\Survey\Views\Question;

use Illuminate\Support\Facades\View;
use SintLucas\Survey\Question;

class MultipleChoiceView {

	public function __construct(Question $question)
	{
		$this->question = $question;
	}

	public function render()
	{
		$view = View::make('survey.question.multiple_choice');
		$view->id            = $this->question->id;
		$view->label         = $this->question->label;
		$view->options       = $this->question->options;
		$view->customAllowed = $this->question->customAllowed();

		return $view;
	}

	public function __toString()
	{
		return (string) $this->render();
	}

}