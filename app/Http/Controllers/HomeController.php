<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // You can return a view or redirect here
        return view('home');  // or return redirect()->route('dashboard');
    }
}
