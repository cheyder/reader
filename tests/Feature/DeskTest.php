<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Folder;
use App\File;
use App\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Exists;
use Laravel\Passport\Passport;

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
  $currentFolder = $this->getRootFolder($user);
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

  public function testStoreTextUrlInDbAndFileOnDiskDesktop () 
  {
    Storage::fake('texts');
    $user = factory(User::class)->create();
    $rootFolder = $this->getRootFolder($user);
    $fileInput = [
      'type' => 'file',
      'title' => 'Software testing',
      'url' => 'https://en.wikipedia.org/wiki/Software_testing'
    ];
    $this->actingAs($user)->post(route('desk.store', ['currentFolderId' => $rootFolder->id]), $fileInput);
    $this->assertDatabaseHas('files', [
      'title' => 'Software testing',
      'url' => 'https://en.wikipedia.org/wiki/Software_testing',
      'parent_id' => $rootFolder->id
    ]);
    $newFile = File::where([
      ['title', '=', 'Software testing'],
      ['user_id', '=', $user->id]
      ])->first();
    Storage::disk('texts')->assertExists($newFile->id . '_' . $newFile->user_id . '.html');
  }

  public function testStoreTextUrlInDbAndFileOnDiskMobile () 
  {
    Storage::fake('texts');
    $user = factory(User::class)->create();
    $rootFolder = $this->getRootFolder($user);
    $fileInput = [
      'type' => 'file',
      'title' => 'Software testing',
      'url' => 'https://en.m.wikipedia.org/wiki/Software_testing'
    ];
    $this->actingAs($user)->post(route('desk.store', ['currentFolderId' => $rootFolder->id]), $fileInput);
    $this->assertDatabaseHas('files', [
      'title' => 'Software testing',
      'url' => 'https://en.m.wikipedia.org/wiki/Software_testing',
      'parent_id' => $rootFolder->id
    ]);
    $newFile = File::where([
      ['title', '=', 'Software testing'],
      ['user_id', '=', $user->id]
    ])->first();
    Storage::disk('texts')->assertExists($newFile->id . '_' . $newFile->user_id . '.html');
  }

  public function testDeleteFolder()
  {
    $user = factory(User::class)->create();
    $currentFolder = $this->getRootFolder($user);
    $folderInput = [
      'type' => 'folder',
      'title' => 'Testfolder',
      'user_id' => $user->id,
      'parent_id' => $currentFolder->id
    ];
    $folder = Folder::create($folderInput);
    $this->delete(route('desk.delete', [
      'elementType' => 'folder',
      'elementId' => $folder->id
    ]));
    $this->assertDeleted('folders', [
      'id' => $folder->id
    ]);
  }

  public function testDeleteFile()
  {
    $user = factory(User::class)->create();
    $currentFolder = $this->getRootFolder($user);
    $fileInput = [
      'type' => 'file',
      'title' => 'Software testing',
      'url' => 'https://en.m.wikipedia.org/wiki/Software_testing',
      'user_id' => $user->id,
      'parent_id' => $currentFolder->id
    ];
    $file = File::create($fileInput);
    $this->delete(route('desk.delete', [
      'elementType' => 'file',
      'elementId' => $file->id
    ]));
    $this->assertDeleted('files', [
      'id' => $file->id
    ]);
  }
  
  public function testViewCollection()
  {
    $user = factory(User::class)->create();
    $rootFolder = $this->getRootFolder($user);
    $response = $this->actingAs($user)->get(route('desk', ['currentFolder' => $rootFolder->id]));

    $folder = Folder::find($rootFolder->id);
    $subfolders = $folder->subfolders()->get();
    $subfiles = $folder->files()->get();

    var_dump($response);

    $response->assertViewHasAll([
      'folder' => $folder,
      'folders' => $subfolders,
      'files' => $subfiles,
      'currentFolder' => $rootFolder->id,
      'nestingLevels' => [1]
    ]);
  }

  private function getRootFolder ($user)
  {
    $folderInput = [
      'user_id' => $user->id,
      'title' => 'Desk of' . $user->name,
      'parent_id' => NULL
    ];
    return Folder::create($folderInput);
  }
}

