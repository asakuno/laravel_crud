<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Topcontroller extends Controller
{
    public function index(){
        return view('top.index');
    }
}
