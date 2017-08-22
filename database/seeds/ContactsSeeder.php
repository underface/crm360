<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker; 

class ContactsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$this->command->info('Tworzenie kontaktów by Faker');
		$faker = Faker::create('pl_PL');

        for($i=1; $i <= 1000000; $i++)
        {   
            DB::table('contracts') -> insert(
                [
                    'customer_id'     => $faker->numberBetween(1,75000),
                    'phone_number'    => $faker->phonenumber,
                    'data_start'      => $faker->dateTimeBetween('2013-01-01','2016-12-31'),
                    'data_end'        => $faker->dateTimeBetween('2016-01-01','2019-12-31'),
                    'contract_number' => $faker->numerify('UM01/D#########/##########'),
                    'pos'             => $faker->randomElement(['JASŁO',
																					'ROPCZYCE',
																					'KROSNO',
																					'NOWA DĘBA',
																					'Kłodzko',
																					'Starogard Gdański',
																					'Jarosław','Sieradz',
																					'Zduńska Wola',
																					'Nowa Sól',
																					'Malbork',
																					'Tczew',
																					'Zgierz',
																					'Ustka',
																					'Śrem',
																					'Kuźnica Masłońska',
																					'Kwidzyn',
																					'Krotoszyn',
																					'Żyrardów',
																					'Kościan',
																					'Swarzędz',
																					'Pęcice',
																					'Pabianice',
																					'Zgorzelec',
																					'Żary',
																					'Oświęcim',
																					'Jawor',
																					'Wola Kiedrzyńska',
																					'Gorlice',
																					'Wejherowo',
																					'Rumia',
																					'Bartoszyce',
																					'Sandomierz',
																					'Łęczna',
																					'Cieszyn',
																					'Chrzanów',
																					'Radomsko',
																					'Sanok',
																					'Pszczyna',
																					'Wągrowiec',
																					'Turek',
																					'Busko-Zdrój',
																					'Pruszcz Gdański',
																					'Luboń','Żywiec',
																					'Studzienice',
																					'Ostrzeszów',
																					'Kętrzyn',
																					'Ostróda',
																					'Bochnia',
																					'Jelcz-Laskowice',
																					'Ząbki',
																					'Września',
																					'Bielawa',
																					'Nowy Targ',
																					'Giżycko',
																					'Dzierżoniów',
																					'Myszków',
																					'Marylka',
																					'Czechowice-Dziedzice',
																					'Łowicz',
																					'Łomianki',
																					'Świebodzice',
																					'Świebodzin',
																					'Lubojenka',
																					'Lubliniec',
																					'Świecie',
																					'Lubartów',
																					'Lidzbark Warmiński',
																					'Świdnik',
																					'Pisz',
																					'Szczytno',
																					'Świdwin',
																					'Kozienice',
																					'Brodnica',
																					'Kościerzyna',
																					'Braniewo',
																					'Koło']),
                    'typ'             => $faker->randomElement(['U','K']),
                    'weryfikacja'     => $faker->randomElement(['0','1']),
                    'data_weryfikacji'=> $faker->dateTimeBetween('2015-01-01','now'),
                    
                ]
            );
			  $this->command->info("Tworzenie kontraktów by Faker: ".$i."/1000000");
        }
    }
}
	