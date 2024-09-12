<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UnitController extends Controller
{
    public function index()
    {
        return view('content.Unit.index');
    }

    public function create()
    {
        return view('content.Unit.add');
    }
}
