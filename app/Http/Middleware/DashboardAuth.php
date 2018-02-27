<?php

namespace App\Http\Middleware;

use Closure;

/**
 * 登录后台权限认证中间件
 * @author vian
 *
 */
class DashboardAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!$request->session()->has('admin')){
            return redirect("dashboard/login");
        } else {
            return $next($request);
        }
    }
}
