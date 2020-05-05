<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DeskController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function collection () {
        $source = 'desk';
        return view('desk/collection', [
            'source' => $source
        ]);
    }

    public function index()
    {
        $source = 'deskIndex';
        return view('desk/index', [
            'source' => $source
        ]);
    }

}
