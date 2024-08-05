<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureHeaderIsSet
{
    public function handle(Request $request, Closure $next)
    {
        // Call the route logic here if necessary
        // You can also use this middleware to set up data or perform checks

        return $next($request);
    }
}
