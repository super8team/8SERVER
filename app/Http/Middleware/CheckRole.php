<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
      // dd($role);
      // dd(Auth::user());
      if(Auth::check()){
        if (Auth::user()->type != $role) {
          $request->session()->flash('fail', "{$role}로 로그인 해야 합니다!");
          return redirect('/');
          // return view('/main', ['alert' => 'gg']);
          // return redirect('/')->with('alert', "$role 유저만 접근할 수 있습니다!");
        }
      } else {
        // dd("login!");
        // return view('/main', ['alert' => 'gg']);
        // return view('/main');
        $request->session()->flash('fail', "로그인 해야 합니다!");
        return redirect('/');
        // ->with('alert', "로그인 해야 합니다!");
        // return redirect('/')->with('message', "로그인 해야 합니다!");
      }
        return $next($request);
    }
}
