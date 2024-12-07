<?php

namespace App\Http\Controllers;

use App\Http\Middleware\AccessLogMiddleware;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    /*public function __construct(){
        $this->middleware(AccessLogMiddleware::class);
        //$this->middleware('access.log')
    }
    */

    public function aboutUs() {
        return view('website.about-us');
    }
}
