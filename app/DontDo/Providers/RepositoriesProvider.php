<?php namespace DontDo\Providers;

use App,
	Illuminate\Support\ServiceProvider;

class RepositoriesProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = true;

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->bind('DontDo\Repositories\DontDoRepository', 'DontDo\Repositories\DontDoDatabaseRepository'); 
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('DontDoRepository');
	}
}