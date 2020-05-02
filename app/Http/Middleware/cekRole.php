<?php

namespace App\Http\Middleware;
use App\User;

use Closure;

class cekRole
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
        $user = User::where('email', $request->email)->first();
        if ($user->role == 'admin') {
            return redirect('admin/dashboard');
        } elseif ($user->status == 'mahasiswa') {
            return redirect('dashboard');
        }

        return $next($request);
    }
}
