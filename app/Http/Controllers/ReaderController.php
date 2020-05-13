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
      $simpleSite = 'https://www.ohnemist.de/bauernbrot-mit-sauerteig-roggenvollkornmehl'; //+-
      $tableSite = 'https://arp242.github.io/hello-css/demo/README.html'; //+
      $wikiSite = 'https://de.wikipedia.org/wiki/Lester_Young'; //+
      $zeitSite = 'https://www.zeit.de/wirtschaft/2020-04/flughafen-berlin-brandenburg-ber-probe-arbeitsablaeufe';//0
      $docuSite = 'https://laravel.com/docs/7.x'; //+
      $scienceSite = 'https://www.scientificamerican.com/article/reading-paper-screens/'; //++

      $readability = new Readability(new Configuration());
      $url = request()->url;
      session()->put('url', $url);
      $html = file_get_contents($url);

      try {
          $readability->parse($html);
          $text = $readability;
          $html = $text->getHTMLAsString();
          session()->put('html', $html);
      } catch (ParseException $e) {
          echo sprintf('Error processing text: %s', $e->getMessage());
      }

      $nestingLevels = session()->get('nestingLevels');
              
      return view('read/text', [
        'text' => $text,
        'nestingLevels' => $nestingLevels
      ]);
    }

    public function contents ()
    {
      $html = session()->get('html');
      $url = session()->get('url');
      //try again with dom-parser?!
      $dom = new DOMDocument();
      @$dom->loadHTML($html);
      $h1 = $dom->getElementsByTagName('h1');
      $h2s = $dom->getElementsByTagName('h2');
      

      return view('read/contents', [
        'url' => $url,
        'h1' => $h1,
        'h2s' => $h2s
      ]);
    }

    public function arrayHwithIds () {
    $length = $h1->item($i)->attributes->length;
    for ($i = 0; $i < $length; ++$i) {
      if ($h1->attributes->item($i)->name == 'id') {
        $id = $h1->attributes->item($i)->nodeValue;
      }
    }
    }

    public function (arrayHeaders) {
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