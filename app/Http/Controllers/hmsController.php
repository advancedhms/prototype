<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class hmsController extends Controller
{
    public function admin() {
        return view('admin');
    }

    public function patient() {
        return view('patient');
    }

    public function pharm() {
        return view('pharm');
    }
}
