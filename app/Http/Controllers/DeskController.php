<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\File;
use App\Folder;

use andreskrey\Readability\Readability;
use andreskrey\Readability\Configuration;
use andreskrey\Readability\ParseException;

use Illuminate\Support\Facades\Storage;

class DeskController extends Controller
{
  private $nestingLevels = [];

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function collection($currentFolder)
  {
    
    $folder = Folder::find($currentFolder);
    if(Gate::allows('view-collection', $folder)) {
      $subfolders = $folder->subfolders()->get();
      $subfiles = $folder->files()->get();

      $this->calculateNestingLevels($currentFolder);
      $nestingLevels = $this->nestingLevels;
      $nestingDepth = count($nestingLevels);

      return view('desk/collection', [
        'folder' => $folder,
        'folders' => $subfolders,
        'files' => $subfiles,
        'currentFolder' => $currentFolder,
        'nestingLevels' => $nestingLevels,
        'nestingDepth' => $nestingDepth
      ]);
    } return back();
   
  }

  public function contents ()
  {
      return view('desk/contents');
  }

  public function store ($currentFolderId)
  {
    $userId = auth()->user()->id;

    if (request(['type'])['type'] == 'folder'){
      $folder = $this->validateFolder();
      $newFolder = Folder::create($folder);
      $newFolder->user_id = $userId;
      $newFolder->parent_id = $currentFolderId;
      $newFolder->save();
    } 
    elseif (request(['type'])['type'] == 'file'){
      $file = $this->validateFile();
      $newFile = File::create($file);
      $newFile->user_id = $userId;
      $newFile->parent_id = $currentFolderId;
      $url = request()->url;
      $text = $this->getParsedHtmlAsString($url);
      $newFileName = $newFile->id. '_' . $newFile->user_id . '.html';
      Storage::disk('texts')->put($newFileName , $text);
      $textUrl = $newFileName;
      $newFile->text_url = $textUrl;
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
      'title' => 'required|string|max:32',
      'position' => 'required|integer|between:1,6'
    ]);
  }

  private function validateFile ()
  {
    return request()->validate([
      'title' => 'required|string|max:32',
      'position' => 'required|integer|between:1,6',
      'url' => 'required|url'
    ]);
  }

  private function calculateNestingLevels ($currentFolderId)
  {
    $currentFolder = Folder::find($currentFolderId);
    $parentId = $currentFolder->parent_id;
    $folderId = $currentFolder->id;
    if ($parentId > 0) {
      $this->calculateNestingLevels($parentId);
    }
    array_push($this->nestingLevels, $folderId);
  }

  private function getParsedHtmlAsString ($url)
  {
    $configuration = new Configuration([
      'SummonCthulhu' => true
    ]);
    $readability = new Readability($configuration);

    $html = file_get_contents($url);
    try {
      $readability->parse($html);
    } catch (ParseException $e) {
      echo sprintf('Error processing text: %s', $e->getMessage());
    }

    $text = $readability->getHTMLAsString();
    return $text;
  }
}