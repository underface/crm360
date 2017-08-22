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

        //$this -> call(ContactsSeeder::class);
        //$this -> call(CommentsSeeder::class);
        $this -> call(CustomersSeeder::class);
    }
}
