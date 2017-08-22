<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $this -> call(ContactsSeeder::class);
<<<<<<< HEAD
        $this -> call(CommentsSeeder::class);
=======
        //$this -> call(CommentsSeeder::class);
>>>>>>> 18f59ec02ebd7d9860fe51319f812cd5fa9eb363
        $this -> call(CustomersSeeder::class);
    }
}
