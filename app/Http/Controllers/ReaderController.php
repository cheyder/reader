<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use andreskrey\Readability\Readability;
use andreskrey\Readability\Configuration;
use andreskrey\Readability\ParseException;
use DOMDocument;
use KubAT\PhpSimple\HtmlDomParser;


class ReaderController extends Controller
{
  

  public function text ()
  {
    $configuration = new Configuration([
      'SummonCthulhu' => true
    ]);
    $readability = new Readability($configuration);
    session()->forget('url');
    $url = request()->url;
    session()->put('url', $url);
    $html = file_get_contents($url);

    $testXSS = '<script>alert(\'hello\')</script><p>If you can only see this, script-tags have been removed.';

    try {
        $readability->parse($html);
        $text = $readability;
        $html = $text->getHTMLAsString();
        session()->put('html', $html);
    } catch (ParseException $e) {
        echo sprintf('Error processing text: %s', $e->getMessage());
    }

    $nestingLevels = session()->get('nestingLevels');

    $id = request()->id;
    
    return view('read/text', [
      'text' => $text,
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