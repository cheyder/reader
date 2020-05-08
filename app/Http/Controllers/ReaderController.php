<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReaderController extends Controller
{
    public function text ()
    {
        return view('read/text');
    }

    public function contents ()
    {
        return view('read/contents');
    }
}