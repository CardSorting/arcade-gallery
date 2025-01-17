<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        //
    ];

    public function handle($request, \Closure $next)
    {
        $response = $next($request);

        // Add CSP headers to allow iframe content
        $response->headers->set('Content-Security-Policy', 
            "frame-ancestors 'self' http://127.0.0.1:8002;");

        return $response;
    }
}
