<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\File;
use App\Folder;

class DeskController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function collection($currentFolder)
  {
    $folder = Folder::find($currentFolder);
    $subfolders = $folder->subfolders()->get();
    $subfiles = $folder->files()->get();
    return view('desk/collection', [
      'folder' => $folder,
      'folders' => $subfolders,
      'files' => $subfiles,
      'currentFolder' => $currentFolder
    ]);
  }

  public function contents ()
  {
      return view('desk/contents');
  }

  public function store ($currentFolderId)
  {
    if (request(['type'])['type'] == 'folder'){
      $folder = $this->validateFolder();
      $newFolder = Folder::create($folder);
      $newFolder->parent_id = $currentFolderId;
      $newFolder->save();
    } 
    elseif (request(['type'])['type'] == 'file'){
      $file = $this->validateFile();
      $newFile = File::create($file);
      $newFile->parent_id = $currentFolderId;
      $newFile->save();
    }
    return redirect(route('desk', ['currentFolder' => $currentFolderId]));
  }

  public function destroy (Folder $folder)
  {
    $folder->delete();
    return redirect(route('desk', ['currentFolder' => $folder->parent_id]));
  }

  private function validateFolder ()
  {
    return request()->validate([
      'title' => 'required|min:3',
      'position' => 'required'
    ]);
  }

  private function validateFile ()
  {
    return request()->validate([
      'title' => 'required',
      'position' => 'required',
      'url' => 'required'
    ]);
  }

}