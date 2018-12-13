<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class PageController extends Controller
{
    public function index()
    {
        return view('landing');
    }
}
