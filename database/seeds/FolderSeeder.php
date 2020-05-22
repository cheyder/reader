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
      'title' => 'Coding',
      'parent_id' => 1,
      'created_at' => now(),
      'updated_at' => now()
    ]);
    DB::table('folders')->insert([
      'user_id' => 1,
      'title' => 'Literatur',
      'parent_id' => 1,
      'created_at' => now(),
      'updated_at' => now()
    ]);
    DB::table('folders')->insert([
      'user_id' => 1,
      'title' => 'Rezepte',
      'parent_id' => 1,
      'created_at' => now(),
      'updated_at' => now()
    ]);
    DB::table('folders')->insert([
      'user_id' => 1,
      'title' => 'Weiterbildung',
      'parent_id' => 2,
      'created_at' => now(),
      'updated_at' => now()
    ]);
    DB::table('folders')->insert([
      'user_id' => 1,
      'title' => 'Laravel',
      'parent_id' => 5,
      'created_at' => now(),
      'updated_at' => now()
    ]);
    DB::table('folders')->insert([
      'user_id' => 1,
      'title' => 'Notate',
      'parent_id' => 3,
      'created_at' => now(),
      'updated_at' => now()
    ]);
    DB::table('folders')->insert([
      'user_id' => 1,
      'title' => 'Texte',
      'parent_id' => 3,
      'created_at' => now(),
      'updated_at' => now()
    ]);
    DB::table('folders')->insert([
      'user_id' => 1,
      'title' => 'Rezensionen',
      'parent_id' => 3,
      'created_at' => now(),
      'updated_at' => now()
    ]);
    DB::table('folders')->insert([
      'user_id' => 1,
      'title' => 'Diskurse',
      'parent_id' => 3,
      'created_at' => now(),
      'updated_at' => now()
    ]);
    DB::table('folders')->insert([
      'user_id' => 1,
      'title' => 'Schnelle Küche',
      'parent_id' => 4,
      'created_at' => now(),
      'updated_at' => now()
    ]);
    DB::table('folders')->insert([
      'user_id' => 1,
      'title' => 'Teige',
      'parent_id' => 4,
      'created_at' => now(),
      'updated_at' => now()
    ]);
  }
}
