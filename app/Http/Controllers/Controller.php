<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class Controller
{
    public function index(): View
    {
        return view('welcome');
    }
}
