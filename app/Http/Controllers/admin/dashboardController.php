<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\blog;
use App\Models\client;
use App\Models\comment;
use App\Models\contact;
use App\Models\project;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function index(Request $request)
    {



        return view('back.panel.home');
    }

    public function addUser(Request $request)
    {


    }
}
