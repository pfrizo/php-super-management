<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test(int $p1, int $p2){
        //echo "Sum of $p1 + $p2 is: ".($p1 + $p2);
        //return view('website.test', ['p1' => $p1, 'p2' => $p2]); //associative array
        return view('website.test', compact('p1', 'p2')); //compact ()
        //return view('website.test')->with('p1', $p1)->with('p2', $p2); //with()
    }
}
