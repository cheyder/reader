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
        $this->validateFolder();
        $newFolder = Folder::create(request(['title']));
        $newFolder->parent_id = $currentFolderId;
        $newFolder->save();
      }
      return redirect(route('desk', ['currentFolder' => $currentFolderId]));
    }

    private function validateFolder ()
    {
      return request()->validate([
        'title' => 'required|min:3',
        'position' => 'required'
      ]);
    }

}