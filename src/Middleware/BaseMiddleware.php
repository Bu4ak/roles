<?php

namespace Bu4ak\Roles\Middleware;

use Closure;
use Exception;
use Illuminate\Contracts\Auth\Factory as Auth;
use function abort;

/**
 * Class BaseMiddleware.
 */
class BaseMiddleware
{
    /**
     * The authentication factory instance.
     *
     * @var \Illuminate\Contracts\Auth\Factory
     */
    protected $auth;
    /**
     * @var string
     */
    private $methodName;

    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
        $this->methodName = lcfirst(class_basename($this));
    }

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @throws Exception
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $this->auth->authenticate();

        if (!$request->user()->{$this->methodName}()) {
            abort(403, 'Forbidden');
        }

        return $next($request);
    }
}
