<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class CommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('pl_PL');

        for($i=1; $i <= 1000000; $i++)
        {
            DB::table('comments') -> insert(
                [
<<<<<<< HEAD
                    'contract_id'  => $faker->numberBetween(1,1000000),
                    'user_id'      => $faker->numberBetween(1,7000),
=======
                    'contract_id'  => $faker->numberBetween(1,4000000),
                    'user_id'      => $faker->numberBetween(1,1),
>>>>>>> 18f59ec02ebd7d9860fe51319f812cd5fa9eb363
                    'comments'     => $faker->text(100),

                ]
            );
        }
    }
}
