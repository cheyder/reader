<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Folder;
use App\User;

class DeskTest extends TestCase
{
  use RefreshDatabase, WithFaker;
   
    public function testStoreFolderAndSubfolder()
    {
      $folderInput = [
        'type' => 'folder',
        'title' => 'Testfolder' 
      ];
      $user = factory(User::class)->create();

      $rootFolder = [
        'user_id' => $user->id,
        'title' => 'Desk of' . $user->name,
        'parent_id' => NULL
      ];
      $currentFolder = Folder::create($rootFolder);

      $this->actingAs($user)->post(route('desk.store', ['currentFolderId' => $currentFolder->id]), $folderInput);

      $this->assertDatabaseHas('folders', [
        'title' => 'Testfolder',
        'parent_id' => $currentFolder->id,
      ]);

      $currentFolder = Folder::where('title', 'Testfolder')->first();
      $subFolderInput = [
        'type' => 'folder',
        'title' => 'SubTestfolder'
      ];
      $this->actingAs($user)->post(route('desk.store', ['currentFolderId' => $currentFolder->id]), $subFolderInput);
    
      $this->assertDatabaseHas('folders', [
          'title' => 'SubTestfolder',
          'parent_id' => $currentFolder->id,
        ]);
      }
  }
