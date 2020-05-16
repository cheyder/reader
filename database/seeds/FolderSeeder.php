<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FolderSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    DB::table('folders')->insert([
      'user_id' => 1,
      'title' => 'Desk',
      'parent_id' => NULL,
      'position' => NULL,
      'created_at' => now(),
      'updated_at' => now()
    ]);
    DB::table('folders')->insert([
      'user_id' => 1,
      'title' => 'Beruf',
      'parent_id' => 1,
      'position' => '1',
      'created_at' => now(),
      'updated_at' => now()
    ]);
    DB::table('folders')->insert([
      'user_id' => 1,
      'title' => 'Hobby',
      'parent_id' => 1,
      'position' => '2',
      'created_at' => now(),
      'updated_at' => now()
    ]);
    DB::table('folders')->insert([
      'user_id' => 1,
      'title' => 'Rezepte',
      'parent_id' => 1,
      'position' => '5',
      'created_at' => now(),
      'updated_at' => now()
    ]);
    DB::table('folders')->insert([
      'user_id' => 1,
      'title' => 'Weiterbildung',
      'parent_id' => 2,
      'position' => '1',
      'created_at' => now(),
      'updated_at' => now()
    ]);
    DB::table('folders')->insert([
      'user_id' => 1,
      'title' => 'Neues Projekt',
      'parent_id' => 3,
      'position' => '1',
      'created_at' => now(),
      'updated_at' => now()
    ]);
    DB::table('folders')->insert([
      'user_id' => 1,
      'title' => 'Schnelle Küche',
      'parent_id' => 4,
      'position' => '2',
      'created_at' => now(),
      'updated_at' => now()
    ]);
  }
}
