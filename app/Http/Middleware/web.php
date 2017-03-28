<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;

class web {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
	    // set locale
//        App::setLocale('en');

		return $next($request);
	}

}
