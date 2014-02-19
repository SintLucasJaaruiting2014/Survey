<?php namespace SintLucas\Survey\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Input;
use SintLucas\School\SchoolRepository;
use SintLucas\Survey\SurveyRepository;
use SintLucas\Survey\Views\SurveyView;

class FrontendController extends Controller {

	protected $surveyRepo;
	protected $schoolRepo;

	/**
	 * Create a new survey frontend controller.
	 *
	 * @param \SintLucas\Survey\SurveyRepository $surveyRepo
	 * @param \SintLucas\School\SchoolRepository $schoolRepo
	 */
	public function __construct(SurveyRepository $surveyRepo, SchoolRepository $schoolRepo)
	{
		$this->surveyRepo = $surveyRepo;
		$this->schoolRepo = $schoolRepo;
	}

	/**
	 * Show the survey.
	 *
	 * @param  string $slug
	 * @return \SintLucas\Survey\Views\SurveyView
	 */
	public function show($slug)
	{
		if($survey = $this->surveyRepo->findBySlug($slug))
		{
			$programs = $this->schoolRepo->getPrograms();

			return new SurveyView($survey, $programs);
		}
	}

	/**
	 * Store the results.
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function store($slug)
	{
		if($survey = $this->surveyRepo->findBySlug($slug))
		{
			$data = Input::get();

			if($this->surveyRepo->insertResult($survey->id, $data))
			{
				//
			}
		}
	}

}