<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//todo rename to Main
class MainPageController extends Controller
{
    public function index() {
        return view('index');
    }
}
