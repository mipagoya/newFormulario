<?php

namespace App\Http\Middleware;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;
use Closure;

class VerifyRoleAdministrator
{
    protected $auth;
    
    public function __construct(Guard $auth) {
        $this->auth = $auth;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if($this->auth->user()->role_id == 1){
            return $next($request);
        }else{
            
            return redirect('403'); 
           //return Redirect::to('404');
        }
        
    }
}
