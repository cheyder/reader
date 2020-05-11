<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker\Factory::create();
      DB::table('files')->insert([
      'title' => $faker->sentence(6, true),
      'url'=> $faker->url(),
      'parent_id' => 1,
      'positions' => '3',
      'created_at' => now(),
      'updated_at' => now()
      ]);
      DB::table('files')->insert([
      'title' => $faker->sentence(6, true),
      'url'=> $faker->url(),
      'parent_id' => 2,
      'positions' => '2',
      'created_at' => now(),
      'updated_at' => now()
      ]);
      DB::table('files')->insert([
      'title' => $faker->sentence(6, true),
      'url' => $faker->url(),
      'parent_id' => 3,
      'positions' => '2',
      'created_at' => now(),
      'updated_at' => now()
      ]);
      DB::table('files')->insert([
      'title' => $faker->sentence(6, true),
      'url' => $faker->url(),
      'parent_id' => 3,
      'positions' => '3',
      'created_at' => now(),
      'updated_at' => now()
      ]);
      DB::table('files')->insert([
      'title' => $faker->sentence(6, true),
      'url' => $faker->url(),
      'parent_id' => 4,
      'positions' => '1',
      'created_at' => now(),
      'updated_at' => now()
      ]);
      DB::table('files')->insert([
      'title' => $faker->sentence(6, true),
      'url' => $faker->url(),
      'parent_id' => 4,
      'positions' => '3',
      'created_at' => now(),
      'updated_at' => now()
      ]);
      DB::table('files')->insert([
      'title' => $faker->sentence(6, true),
      'url' => $faker->url(),
      'parent_id' => 5,
      'positions' => '1',
      'created_at' => now(),
      'updated_at' => now()
      ]);
      DB::table('files')->insert([
      'title' => $faker->sentence(6, true),
      'url' => $faker->url(),
      'parent_id' => 5,
      'positions' => '3',
      'created_at' => now(),
      'updated_at' => now()
      ]);
      DB::table('files')->insert([
      'title' => $faker->sentence(6, true),
      'url' => $faker->url(),
      'parent_id' => 5,
      'positions' => '5',
      'created_at' => now(),
      'updated_at' => now()
      ]);


    }
}
