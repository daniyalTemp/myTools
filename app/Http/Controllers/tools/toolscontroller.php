<?php

namespace App\Http\Controllers\tools;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class toolscontroller extends Controller
{
    public function index()
    {
        return view('tools.index');
    }
}
