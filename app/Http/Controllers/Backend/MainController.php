<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

class MainController extends Controller
{
    public function index()
    {
        return view('backend.index');
    }
}
