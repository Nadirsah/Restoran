<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Spatie\Permission\Exceptions\UnauthorizedException;

class PermissionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $permission = null, $guard = null)
    {
        $authGuard = app('auth')->guard($guard);
        if ($authGuard->guest()) {
            throw UnauthorizedException::notLoggedIn();
        }
        if (! is_null($permission)) {
            $permissions = is_array($permission) ? $permission : explode('|', $permission);
        }
        if (is_null($permission)) {
            $permission = $request->route()->getName();
            $permissions = [$permission];
        }
        foreach ($permissions as $permission) {
            if ($authGuard->user()->can($permission)) {
                return $next($request);
            }
        }
        session()->flash('error', 'Sizin bu səhifəyə daxil olmaq icazəniz yoxdur.');

        return redirect()->back()->with('type', 'danger')->with('message', 'Bu səhifəyə daxil olmağa icazə yoxdur!');
    }
}
