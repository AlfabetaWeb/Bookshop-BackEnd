<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class IsSuperAdmin
{
    const ROLE_SUPER_ADMIN = 3;

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $userId = auth()->user()->id;
        $user = User::find($userId);
        $isSuperAdmin = $user->roles->contains(self::ROLE_SUPER_ADMIN);

        if (!$isSuperAdmin) {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'No existe esta ruta'
                ],
                404
            );
        }

        return $next($request);
    }
}