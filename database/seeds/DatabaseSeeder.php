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

      $faker = Faker::create('pl_PL');

      for($i=1; $i <= 10000; $i++)
      {
          DB::table('comments') -> insert(
             [

                  'contract_id'  => $faker->numberBetween(1,1000000),
                  'user_id'      => $faker->numberBetween(1,7000),
                  'contract_id'  => $faker->numberBetween(1,4000000),
                  'user_id'      => $faker->numberBetween(1,1),
                  'comments'     => $faker->text(100),

             ]
          );
      }

        //$this -> call(ContactsSeeder::class);
        //$this -> call(CommentsSeeder::class);
        //$this -> call(CustomersSeeder::class);
    }
}
