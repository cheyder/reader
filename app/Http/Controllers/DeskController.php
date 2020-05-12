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

}