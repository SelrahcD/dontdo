<?php namespace DontDo\Providers;

use App,
	Illuminate\Support\ServiceProvider;

class DontDoErrorProvider extends ServiceProvider {

	public function register()
	{
		// 
	}

	public function boot()
	{
		// NotFoundException handler
		App::error(function(\DontDo\Exceptions\NotFoundException $e)
		{
			$default_message = 'The requested resource was not found';
			return Response::json(array(
				'error' => $e->getMessage() ?: $default_message,
			), 404, $headers);
		});
	}

}