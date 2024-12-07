<?php

namespace App\Http\Controllers;

use App\ContactType;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function main(){
        $contact_types = ContactType::all();

        return view('website.main', ['contact_types' => $contact_types]);
    }
}
