<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\CodeCoverage\Report\Html\painelDeControle;

class RedirectIfAdmin
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        if ($user && $user->usertype === 'admin' && $request->path() === 'painelDeControle'){
            return redirect()->route('admin.painelDeControle');
        }

        return $next($request);
    }
}
