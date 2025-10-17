<?php

namespace App\Http\Middleware;

use App\Models\UserModule;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckModuleActive
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $request->user();
        $modules = UserModule::where('user_id', Auth::id())
            ->where('active', true)
            ->first();

        if (!$modules) {
            return response()->json([
                'error' => 'Module inactive. Please activate this module to use it.'
            ], 403);
        } else {
            return $next($request);
        }
    }
}
