<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class OperadorMiddleware {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{


        if(Auth::User()->UserLevel != 0 && Auth::User()->UserLevel != 2 ) {
            return redirect('menu')->with('message','Usted no esta Autorizado a ingresar en esta ruta');
        }/* elseif(Auth::check() != TRUE) {
            return redirect('auth/logout');
        }*/
        return $next($request);

	}

}
