<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LocalizeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($lang)
    {
        app()->setLocale($lang);
        // set the session
        session()->put('lang', $lang);
        // return redirect($currentURL);
        return back();
    }
}
