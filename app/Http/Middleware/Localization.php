<?php

namespace App\Http\Middleware;

use App;
use Config;
use Session;
use Closure;

class Localization
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
        // $uri_splited = explode('/', $request->path());
        if (!Session::has('locale')) {
           Session::put('locale', Config::get('app.locale'));
        } 
        // if (Session::has('locale') && Session::get('locale') != $uri_splited[0]) {
        //     Session::put('locale', $uri_splited[0]);
        // }
        App::setLocale(session('locale'));
        // dd(session()->get('locale'));
        return $next($request);
    }
}
