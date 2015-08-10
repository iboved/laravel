<?php

namespace App\Http\Middleware;

use App\Question;
use Closure;
use Illuminate\Contracts\Auth\Guard;

class CheckAuthorMiddleware
{
    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * Create a new filter instance.
     *
     * @param  Guard  $auth
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $slug = $request->segment(2);
        $question = Question::findBySlugOrFail($slug);

        if ($this->auth->user() != $question->user) {
            return response()->view('errors.403', [], 403);
        }

        return $next($request);
    }
}
