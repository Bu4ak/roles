<?php

namespace Bu4ak\Roles\Middleware;

use Closure;
use Exception;
use Illuminate\Support\Facades\Auth;

/**
 * Class BaseMiddleware.
 */
class BaseMiddleware
{
    /**
     * @var string
     */
    private $methodName;

    /**
     * BaseMiddleware constructor.
     */
    public function __construct()
    {
        $this->methodName = 'is'.class_basename($this);
    }

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     *
     * @throws Exception
     */
    public function handle($request, Closure $next)
    {
        if (!isset(Auth::user()->role_id)) {
            throw new Exception('User don\'t has role_id property.');
        }

        if (Auth::check() && Auth::user()->{$this->methodName}()) {
            return $next($request);
        }
        return response(['error' => 'permission denied'], 403);
    }
}
