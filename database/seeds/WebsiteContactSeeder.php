<?php

use App\WebsiteContact;
use Illuminate\Database\Seeder;

class WebsiteContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*$contact = new WebsiteContact();
        $contact->name = 'SG System';
        $contact->phone = '(11) 99898-7777';
        $contact->email = 'contact@sg.com';
        $contact->contact_type = 1;
        $contact->message = 'Welcome to Super Management System!';
        $contact->save();

        WebsiteContact::create([
            'name' => 'SG System2',
            'phone' => '(11) 99898-7777',
            'email' => 'contact@sg.com',
            'contact_type' => 2,
            'message' => 'Welcome to Super Management System!'
        ]);*/

        factory(WebsiteContact::class, 50)->create();
    }
}
