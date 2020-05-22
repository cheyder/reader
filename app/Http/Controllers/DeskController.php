<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\File;
use App\Folder;

use andreskrey\Readability\Readability;
use andreskrey\Readability\Configuration;
use andreskrey\Readability\ParseException;
use KubAT\PhpSimple\HtmlDomParser;

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

      return view('desk/collection', [
        'folder' => $folder,
        'folders' => $subfolders,
        'files' => $subfiles,
        'currentFolder' => $currentFolder,
        'nestingLevels' => $nestingLevels
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
      $newFile = $this->validateFile();
      $newFile['user_id'] = $userId;
      $newFile = File::create($newFile);
      $newFile->parent_id = (int) $currentFolderId;

      $url = request()->url;
      $text = $this->getParsedHtml($url);
      $newFileName = $newFile->id . '_' . $newFile->user_id . '.html';
      Storage::disk('texts')->put($newFileName, $text);
      $textUrl = $newFileName;
      $newFile->text_url = $textUrl;
      

      $headers = $this->getHeaderArray($text);
      $newHeadersFileName = $newFile->id . '_' . $newFile->user_id . '_headers.json';
      Storage::disk('texts')->put($newHeadersFileName, $headers);
      $newFile->headers_url = $newHeadersFileName;

      $abstract = $this->getAbstract($text);
      $newFile->abstract = $abstract;

      

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
      'title' => 'required|string|max:32'
    ]);
  }

  private function validateFile ()
  {
    return request()->validate([
      'title' => 'required|string|max:32',
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

  private function getParsedHtml ($url)
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
    $text = $this->getHTMLAsString($readability);
    return $text;
  }

  private function getHTMLAsString ($readability)
  {
    return sprintf('<h1>%s</h1>%s', $readability->getTitle(), $readability->getContent());
  }

  private function getAbstract($text) 
  {
    $prepParsing = HTMLDomParser::str_get_html($text);
    $contentNodes = $prepParsing->find('p');
    $content = array_shift($contentNodes);
    $contentStripped = strip_tags($content->innertext);
    $contentSplits = str_split($contentStripped, 255);
    $abstract = array_shift($contentSplits);

    return $abstract;
  }

  private function getHeaderArray ($text) 
  {
    $prepParsing = HTMLDomParser::str_get_html($text);
    $parsedHeaders = $prepParsing->find('h1, h2, h3');
    $headers = [];
    foreach ($parsedHeaders as $header) {
      if ($header->tag === "h1") {
        array_push($headers, ['type' => 'h1', 'id' => $header->id, 'header' => $header->innertext]);
      } 
      if ($header->tag === "h2") {
        if (count($header->children) > 0) {
          foreach ($header->children as $child) {
            similar_text($child->id, $child->innertext, $percent);
            if ($percent > 80) {
              array_push($headers, ['type' => 'h2', 'id' => $child->id, 'header' => $child->innertext]);
            }
          }
        } else {
          array_push($headers, ['type' => 'h2', 'id' => $header->id, 'header' => $header->innertext]);
        }
      } 
      if ($header->tag === "h3") {
        if (count($header->children) > 0) {
          foreach ($header->children as $child) {
            similar_text($child->id, $child->innertext, $percent);
            if ($percent > 80) {
              array_push($headers, ['type' => 'h3', 'id' => $child->id, 'header' => $child->innertext]);
            }
          }
        } else {
          array_push($headers, ['type' => 'h3', 'id' => $header->id, 'header' => $header->innertext]);
        }
      } 
    }
    return json_encode($headers);
  }
}