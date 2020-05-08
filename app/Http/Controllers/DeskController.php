<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DeskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function collection()
    {
        return view('desk/collection');
    }

    public function contents ()
    {
        return view('desk/contents');
    }

}