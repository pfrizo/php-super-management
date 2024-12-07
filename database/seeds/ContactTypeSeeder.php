<?php

use App\ContactType;
use Illuminate\Database\Seeder;

class ContactTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ContactType::create(['contact_type' => 'Dúvida']);
        ContactType::create(['contact_type' => 'Elogio']);
        ContactType::create(['contact_type' => 'Reclamação']);
    }
}
