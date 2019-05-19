<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\User_empresa;


class CheckCompanyOwner
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
        if (Auth::check()) { 
            $user = Auth::user();
            User_empresa::where(['empresa_id' => $request->empresa_id, 'user_id' => $user->id])->firstOrFail();
            return $next($request);
        }
        return redirect('/');
    }
}
