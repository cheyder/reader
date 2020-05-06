<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReaderController extends Controller
{
    public function read ()
    {
        $source = 'read';
        return view('read/text', [
            'source' => $source
        ]);
    }

    public function index ()
    {
        $source = 'readIndex';
        return view('read/index', [
            'source' => $source
        ]);
    }
}