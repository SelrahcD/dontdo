<?php

use DontDo\Entities\DontDo;

class DontDoTableSeeder extends Seeder {
	
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('dontdo')->delete();

		$faker = Faker\Factory::create();

		for($i = 0; $i < 50; $i++)
		{
			$dontDo = new DontDo(array(
				'dont' => $faker->text,
				'do'   => $faker->text
				));

			$dontDo->save();
		}
	}
}