<?php

namespace App\Http\Middleware;
use Session;
use Closure;
use Illuminate\Http\Request;
use App\Http\Controllers\LanguageController;
use Log;
use App;

    class Localization
{
   public function handle(Request $request, Closure $next)
   {
       if (Session::has('locale')) {
           $locale = Session::get('locale');
           Log::debug("Session 'locale' is '$locale'");
           App::setLocale($locale);
       }
 
       return $next($request);
   }
}

