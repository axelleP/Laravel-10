<?php

namespace App\Http\Controllers;

class ErrorController extends Controller
{
    public function showError404() {
        return view('error.404');
    }
}
