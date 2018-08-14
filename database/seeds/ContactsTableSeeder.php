<?php

use Illuminate\Database\Seeder;
use App\Contact;
class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contactQuantity = 100;

        factory(Contact::class, $contactQuantity)->create();
    }
}