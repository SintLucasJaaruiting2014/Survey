<?php namespace SintLucas\Survey\Views\Question;

use Illuminate\Support\Facades\View;
use SintLucas\Core\AbstractView;
use SintLucas\Survey\QuestionCollection;
use SintLucas\Survey\Views\Question\MultipleChoiceView;
use SintLucas\Survey\Views\Question\OpenView;

class QuestionView extends AbstractView {

	protected $questions;

	public function __construct(QuestionCollection $questions)
	{
		$this->questions = $questions;
	}

	public function render()
	{
		$view = View::make('survey.question.list');

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
}