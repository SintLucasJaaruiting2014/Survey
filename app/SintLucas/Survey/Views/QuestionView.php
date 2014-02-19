<?php namespace SintLucas\Survey\Views;

use Illuminate\Support\Facades\View;
use SintLucas\Survey\QuestionCollection;
use SintLucas\Survey\Views\Question\MultipleChoiceView;
use SintLucas\Survey\Views\Question\OpenView;

class QuestionView {

	protected $questions;

	public function __construct(QuestionCollection $questions)
	{
		$this->questions = $questions;
	}

	public function render()
	{
		$view = View::make('survey.question.index');

		$view->questions = array();
		foreach($this->questions as $question)
		{
			if($question->isMultipleChoice())
			{
				$view->questions[] = new MultipleChoiceView($question);
			}
			else
			{
				$view->questions[] = new OpenView($question);
			}
		}

		return $view;
	}

	public function __toString()
	{
		return (string) $this->render();
	}

}