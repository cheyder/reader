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
      'user_id' => 1,
      'title' => $faker->sentence(6, true),
      'url'=> $faker->url(),
      'parent_id' => 1,
      'position' => '3',
      'created_at' => now(),
      'updated_at' => now()
      ]);
      DB::table('files')->insert([
      'user_id' => 1,
      'title' => $faker->sentence(6, true),
      'url'=> $faker->url(),
      'parent_id' => 2,
      'position' => '2',
      'created_at' => now(),
      'updated_at' => now()
      ]);
      DB::table('files')->insert([
      'user_id' => 1,
      'title' => $faker->sentence(6, true),
      'url' => $faker->url(),
      'parent_id' => 3,
      'position' => '2',
      'created_at' => now(),
      'updated_at' => now()
      ]);
      DB::table('files')->insert([
      'user_id' => 1,
      'title' => $faker->sentence(6, true),
      'url' => $faker->url(),
      'parent_id' => 3,
      'position' => '3',
      'created_at' => now(),
      'updated_at' => now()
      ]);
      DB::table('files')->insert([
      'user_id' => 1,
      'title' => $faker->sentence(6, true),
      'url' => $faker->url(),
      'parent_id' => 4,
      'position' => '1',
      'created_at' => now(),
      'updated_at' => now()
      ]);
      DB::table('files')->insert([
      'user_id' => 1,
      'title' => $faker->sentence(6, true),
      'url' => $faker->url(),
      'parent_id' => 4,
      'position' => '3',
      'created_at' => now(),
      'updated_at' => now()
      ]);
      DB::table('files')->insert([
      'user_id' => 1,
      'title' => $faker->sentence(6, true),
      'url' => $faker->url(),
      'parent_id' => 5,
      'position' => '1',
      'created_at' => now(),
      'updated_at' => now()
      ]);
      DB::table('files')->insert([
      'user_id' => 1,
      'title' => $faker->sentence(6, true),
      'url' => $faker->url(),
      'parent_id' => 5,
      'position' => '3',
      'created_at' => now(),
      'updated_at' => now()
      ]);
      DB::table('files')->insert([
      'user_id' => 1,
      'title' => $faker->sentence(6, true),
      'url' => $faker->url(),
      'parent_id' => 5,
      'position' => '5',
      'created_at' => now(),
      'updated_at' => now()
      ]);


    }
}
