<?php

/*  
    Ecли пользователь залогинен и он админ, тогда допускаем его к админским маршрутам

    Регестрируем класс-посредник под псевдонимом 'admin' в файле: app/Http/Kernel.php

    protected $routeMiddleware = [
        'admin' => \App\Http\Middleware\AdminMiddleware::class,
    ];
*/

namespace App\Http\Middleware;

use Closure;
use Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    
    public function handle($request, Closure $next)
    {   
        if (Auth::check() && Auth::user()->is_admin) {
            return $next($request);
        }

        abort(404);
    }
}
