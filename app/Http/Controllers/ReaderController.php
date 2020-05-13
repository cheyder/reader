<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use andreskrey\Readability\Readability;
use andreskrey\Readability\Configuration;
use andreskrey\Readability\ParseException;


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
          session()->put('text', $text);
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
      $text = session()->get('text');
      $url = session()->get('url');
      return view('read/contents', [
        'text' => $text,
        'url' => $url
      ]);
    }
}