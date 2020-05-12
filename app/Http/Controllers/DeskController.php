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
  public function collection($currentFolder, Request $request)
  {
    
    $folder = Folder::find($currentFolder);
    $subfolders = $folder->subfolders()->get();
    $subfiles = $folder->files()->get();
    $this->calculateNestingLevels($currentFolder);
    $nestingLevels = session()->get('nestingLevels');
    $nestingDepth = count($nestingLevels);
    return view('desk/collection', [
      'folder' => $folder,
      'folders' => $subfolders,
      'files' => $subfiles,
      'currentFolder' => $currentFolder,
      'nestingLevels' => $nestingLevels,
      'nestingDepth' => $nestingDepth
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

  public function delete ($elementType, $elementId)
  {
    if ($elementType == 'folder') {
      $folder = Folder::find($elementId);
      $folder->delete();
      return redirect(route('desk', ['currentFolder' => $folder->parent_id]));
    }
    if ($elementType == 'file') {
      $file = File::find($elementId);
      $file->delete();
      return redirect(route('desk', ['currentFolder' => $file->parent_id]));
    }
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

  private function calculateNestingLevels ($currentFolder)
  {
    session()->forget('nestingLevels');
    $nestingLevels = [];
    session()->put('nestingLevels', $nestingLevels);
    $this->addAllParents($currentFolder);
  }

  private function addAllParents ($currentFolderId) 
  {
    $currentFolder = Folder::find($currentFolderId);
    $parentId = $currentFolder->parent_id;
    $folderId = $currentFolder->id;
    session()->push('nestingLevels', $folderId);
    if ($parentId > 0) {
      $this->addAllParents($parentId);
    }
  }

}