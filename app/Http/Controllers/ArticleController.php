<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function showList() {
        return view('article.list');
    }

    public function showView() {
        return view('article.view');
    }

    public function showForm() {
        return view('article.form');
    }

    public function save(Request $request) {
        return redirect('article.list');
    }

    public function delete(Request $request) {
        return redirect('article.list');
    }
}
