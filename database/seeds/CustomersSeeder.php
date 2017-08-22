<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker; 

class CustomersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('pl_PL');
        for($i=1; $i <= 40000; $i++)
        {   
            DB::table('customers') -> insert(
                [
                    'customer_number'  => $faker->pesel,
                    'name'             => $faker->name,
                    'customer_contact' => $faker->phonenumber,
                    'customer_type'    => 'P',
                    
                ]
            );
           $this->command->info("Tworzenie klientów by Faker: ".$i." /75000");
        }

        for($i=40001; $i <= 75000; $i++)
        {   /////
            DB::table('customers') -> insert(
                [
                    'customer_number' => $faker->taxpayerIdentificationNumber,
                    'name'              => $faker->company,
                    'customer_contact'    => $faker->phonenumber,
                    'customer_type'    => 'F',
                ]
            );
           $this->command->info("Tworzenie klientów by Faker: ".$i." /75000");
        }
    }
}
