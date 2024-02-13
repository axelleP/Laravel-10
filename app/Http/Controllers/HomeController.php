<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function index() {
        $joke = Cache::get('joke') ?? null;
        return view('home', ['joke' => $joke]);
    }
}
