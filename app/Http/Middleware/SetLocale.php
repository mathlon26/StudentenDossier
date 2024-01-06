<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Route;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {

        $url = url()->current();
        $parsedUrl = parse_url($url);
        
        if ($parsedUrl['path'] ?? false)
        {
            $pathSegments = explode('/', $parsedUrl['path']);
            $lang = $pathSegments[1];
            app()->setLocale($lang);
        }
        else
        {
            app()->setLocale('en');
        }

        // Assuming the language code is the second segment in the path
        
        // Continue with the request
        return $next($request);
    }
}
