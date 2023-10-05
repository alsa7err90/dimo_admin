<?php

namespace App\Http\Middleware;

use App\Constants\Roles;
use Closure;
use Illuminate\Http\Request;
 

class AdminEditorMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $user = $request->user();
        if ($user->hasAnyRole([Roles::Admin, Roles::Editor])) {
            return $next($request);
        }
        abort(403); // رمي استثناء 403 Forbidden إذا لم يكن لدى المستخدم الصلاحية المناسبة
    }
}