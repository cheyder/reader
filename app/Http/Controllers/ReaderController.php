<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DOMDocument;
use KubAT\PhpSimple\HtmlDomParser;
use Illuminate\Support\Facades\Storage;
use App\File;


class ReaderController extends Controller
{
  

  public function text ()
  {
    $textId = request()->id;
    $currentFolder = File::find($textId)->parent_id;
    $html = $this->getHtmlFromDb($textId);
    
    $nestingLevels = session()->get('nestingLevels');
    
    
    return view('read/text', [
      'text' => $html,
      'nestingLevels' => $nestingLevels,
      'id' => $textId,
      'currentFolder' => $currentFolder
    ]);
  }

  public function contents ()
  {
    $textId = request()->id;
    $html = $this->getHtmlFromDb($textId);
    $prepParsing = HTMLDomParser::str_get_html($html);
    $headers = $prepParsing->find('h1, h2, h3');

    return view('read/contents', [
      'id' => $textId,
      'headers' => $headers
    ]);
  }

  private function getHtmlFromDb ($textId) {
    $fileUrl = File::where('id', $textId)->first()->text_url;
    $html = Storage::disk('texts')->get($fileUrl);
    return $html;
  }

}