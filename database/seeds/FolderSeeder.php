<?php

use Illuminate\Database\Seeder;
use App\Folder;

class FolderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Folder::class, 3)
            ->create()
            ->each(function ($folder) {
                $folder->parent_id()->save(factory(Folder::class)->make());
            });
    }
}
