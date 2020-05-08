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
      'title' => 'Beruf',
      'parent_id' => NULL,
      'positions' => '1',
      'created_at' => now(),
      'updated_at' => now()
    ]);
    DB::table('folders')->insert([
      'title' => 'Hobby',
      'parent_id' => NULL,
      'positions' => '2',
      'created_at' => now(),
      'updated_at' => now()
    ]);
    DB::table('folders')->insert([
      'title' => 'Rezepte',
      'parent_id' => NULL,
      'positions' => '5',
      'created_at' => now(),
      'updated_at' => now()
    ]);
    DB::table('folders')->insert([
      'title' => 'Weiterbildung',
      'parent_id' => 1,
      'positions' => '1',
      'created_at' => now(),
      'updated_at' => now()
    ]);
    DB::table('folders')->insert([
      'title' => 'Neues Projekt',
      'parent_id' => 2,
      'positions' => '1',
      'created_at' => now(),
      'updated_at' => now()
    ]);
    DB::table('folders')->insert([
      'title' => 'Schnelle Küche',
      'parent_id' => 3,
      'positions' => '2',
      'created_at' => now(),
      'updated_at' => now()
    ]);
  }
}
