<?php namespace SintLucas\Provider;

use Illuminate\Support\ServiceProvider;
use SintLucas\School\SchoolRepository;
use SintLucas\School\Location;
use SintLucas\School\Program;

class SchoolServiceProvider extends ServiceProvider {

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
		$this->app['school.repo'] = $this->app->share(function($app)
		{
			return new SchoolRepository(new Program, new Location);
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