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
    $url = request()->url;
    $fileUrl = File::where('url', $url)->first()->text_url;
    $html = Storage::disk('texts')->get($fileUrl);
    session()->put('html', $html);

    session()->forget('url');
    session()->put('url', $url);
    
    $nestingLevels = session()->get('nestingLevels');

    $id = request()->id;
    
    return view('read/text', [
      'text' => $html,
      'nestingLevels' => $nestingLevels,
      'id' => $id
    ]);
  }

  public function contents ()
  {
    $html = HTMLDomParser::str_get_html(session()->get('html'));
    $url = session()->get('url');
    $headers = $html->find('h1, h2, h3');
    //try again with dom-parser?!
    

    return view('read/contents', [
      'url' => $url,
      'headers' => $headers
    ]);
  }
  public function parkingDOMDocument () {
    $dom = new DOMDocument();
    @$dom->loadHTML($html);
    $h1 = $dom->getElementsByTagName('h1');
    $h2s = $dom->getElementsByTagName('h2');
    
  }
  public function arrayHwithIds () {
  $length = $h1->item($i)->attributes->length;
  for ($i = 0; $i < $length; ++$i) {
    if ($h1->attributes->item($i)->name == 'id') {
      $id = $h1->attributes->item($i)->nodeValue;
    }
  }
  }

  public function arrayHeaders () {
  $headings = [];
  for ($i = 0; $i < $h2s->length; $i++) {
    foreach ($h2s->item($i)->childNodes as $childNode) {
      if ($childNode->nodeName == 'h*') {
        array_push($headings, $childNode);
      }
    }
  }
  }

}