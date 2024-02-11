<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function showList() {
        $articles = Article::all();
        return view('article.list', ['articles' => $articles]);
    }

    public function showView() {
        return view('article.view');
    }

    public function showForm() {
        return view('article.form');
    }

    public function save(Request $request) {
        var_dump($request);exit;
        return redirect('article.list');
    }

    public function delete(Request $request) {
        return redirect('article.list');
    }
}
