<?php

use Illuminate\Routing\Controller;
use SintLucas\Survey\Views\SurveyView;

class SurveyController extends Controller {

	protected $repo;

	public function __construct(SurveyRepository $repo)
	{
		$this->repo = $repo;
	}

	/**
	 * Show the survey.
	 *
	 * @param  string $slug
	 * @return \SintLucas\Survey\Views\SurveyView
	 */
	public function show($slug)
	{
		if($survey = $this->repo->findBySlug($slug))
		{
			return new SurveyView($survey);
		}
	}

	public function store()
	{
		//
	}

}