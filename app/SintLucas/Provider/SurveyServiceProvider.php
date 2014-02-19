<?php namespace SintLucas\Provider;

use Illuminate\Support\ServiceProvider;
use SintLucas\Survey\Answer;
use SintLucas\Survey\Controllers\FrontendController;
use SintLucas\Survey\Option;
use SintLucas\Survey\Question;
use SintLucas\Survey\Result;
use SintLucas\Survey\Survey;
use SintLucas\Survey\SurveyRepository;

class SurveyServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		//
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app['survey.repo'] = $this->app->share(function($app)
		{
			return new SurveyRepository(new Survey, new Question, new Option, new Result, new Answer);
		});

		$this->app['survey.controllers.frontend'] = $this->app->share(function($app)
		{
			return new FrontendController($app['survey.repo'], $app['school.repo']);
		});
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}