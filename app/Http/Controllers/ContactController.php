<?php

namespace App\Http\Controllers;

use App\ContactType;
use App\WebsiteContact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function contact() {
        $contact_types = ContactType::all();

        return view('website.contact', ['contact_types' => $contact_types]);
    }

    public function save(Request $request){
        
        $request->validate(
            [
                'name' => 'required|min:2|max:50',
                'phone' => 'required',
                'email' => 'required|email',
                'contact_type_id' => 'required',
                'message' => 'required|max:2000'
            ],
            [
                'name.required' => 'O campo nome deve ser preenchido',
                'name.min' => 'O campo nome deve possuir no mínimo 2 caracteres',
                'name.max' => 'O campo nome deve possuir no máximo 50 caracteres',

                'phone.required' => 'O campo telefone deve ser preenchido',

                'email.required' => 'O campo e-mail deve ser preenchido',
                'email.email' => "O e-mail informado não é válido",

                'required' => 'O campo :attribute deve ser preenchido',

            ]
        );

        WebsiteContact::create($request->all());
        return redirect()->route('website.index');
        
        /*
        $contact = new WebsiteContact();
        $contact->name = $request->input('name');
        $contact->phone = $request->input('phone');
        $contact->email = $request->input('email');
        $contact->contact_type = $request->input('contact_type');
        $contact->message = $request->input('message');
        */

        //print_r($contact->getAttributes());
        //$contact = new WebsiteContact();
        //$contact->create($request->all());
        
        /*
        $contact->fill($request->all());
        $contact->save();
        */

        //WebsiteContact::create($request->all());
    }
}
