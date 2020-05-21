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
        'title' => 'Honigbiene',
        'url'=> 'https://de.wikipedia.org/wiki/Westliche_Honigbiene',
        'parent_id' => 1,
        'position' => '3',
        'created_at' => now(),
        'updated_at' => now()
      ]);
      DB::table('files')->insert([
        'user_id' => 1,
        'title' => 'Gespräch',
        'url' => 'https://de.wikipedia.org/wiki/Gespräch',
        'parent_id' => 1,
        'position' => '3',
        'created_at' => now(),
        'updated_at' => now()
      ]);
      DB::table('files')->insert([
      'user_id' => 1,
      'title' => 'Holochain Basics',
      'url'=> 'https://developer.holochain.org/docs/concepts/1_the_basics/',
      'parent_id' => 2,
      'position' => '2',
      'created_at' => now(),
      'updated_at' => now()
      ]);
    DB::table('files')->insert([
      'user_id' => 1,
      'title' => 'Testing',
      'url' => 'https://laravel.com/docs/7.x/testing',
      'parent_id' => 6,
      'position' => '1',
      'created_at' => now(),
      'updated_at' => now()
    ]);
    DB::table('files')->insert([
      'user_id' => 1,
      'title' => 'Events',
      'url' => 'https://laravel.com/docs/7.x/events',
      'parent_id' => 6,
      'position' => '2',
      'created_at' => now(),
      'updated_at' => now()
    ]);
    DB::table('files')->insert([
      'user_id' => 1,
      'title' => 'Cache',
      'url' => 'https://laravel.com/docs/7.x/cache',
      'parent_id' => 6,
      'position' => '3',
      'created_at' => now(),
      'updated_at' => now()
    ]);
      DB::table('files')->insert([
      'user_id' => 1,
      'title' => 'Der Platz',
      'url' => 'https://www.perlentaucher.de/buch/annie-ernaux/der-platz.html',
      'parent_id' => 9,
      'position' => '1',
      'created_at' => now(),
      'updated_at' => now()
      ]);
      DB::table('files')->insert([
      'user_id' => 1,
      'title' => 'Galettes bretonnes',
      'url' => 'https://zartbitter-und-zuckersuess.de/galettes/',
      'parent_id' => 12,
      'position' => '2',
      'created_at' => now(),
      'updated_at' => now()
      ]);
      DB::table('files')->insert([
      'user_id' => 1,
      'title' => 'Roggenvollkornbrot',
      'url' => 'https://www.ohnemist.de/bauernbrot-mit-sauerteig-roggenvollkornmehl',
      'parent_id' => 12,
      'position' => '1',
      'created_at' => now(),
      'updated_at' => now()
      ]);
      DB::table('files')->insert([
      'user_id' => 1,
      'title' => 'Elsässer Flammkuchen',
      'url' => 'https://www.lecker.de/elsaesser-flammkuchen-63032.html',
      'parent_id' => 12,
      'position' => '3',
      'created_at' => now(),
      'updated_at' => now()
      ]);
      


    }
}
