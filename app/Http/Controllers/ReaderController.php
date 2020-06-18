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
    $html = $this->getHtml($textId);
    
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
    $headers = $this->getHeaders($textId);
    
    return view('read/contents', [
      'id' => $textId,
      'headers' => $headers
    ]);
  }

  private function getHtml ($textId) {
    $fileUrl = File::where('id', $textId)->first()->text_url;
    $html = Storage::disk('texts')->get($fileUrl);
    return $html;
  }

  private function getHeaders ($textId) {
    $headersUrl = File::where('id', $textId)->first()->headers_url;
    $headers = Storage::disk('texts')->get($headersUrl);
    return json_decode($headers, true);
  }

}