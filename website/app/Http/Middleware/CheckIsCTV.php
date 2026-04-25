<?php

namespace App\Http\Middleware;

use App\Models\CtvProfile;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * CheckIsCTV Middleware
 *
 * Ensures the authenticated user has an entry in the ctv_profiles table.
 * Only users who are registered as CTV (collaborators) may access
 * the routes protected by this middleware.
 */
class CheckIsCTV
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();     // from 'web' or 'sanctum' guard

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthenticated. Please log in first.',
            ], 401);
        }

        // Check if a ctv_profiles row exists for this user
        $isCTV = CtvProfile::where('user_id', $user->id)->exists();

        if (!$isCTV) {
            return response()->json([
                'success' => false,
                'message' => 'Access denied. You are not registered as a CTV.',
            ], 403);
        }

        return $next($request);
    }
}
