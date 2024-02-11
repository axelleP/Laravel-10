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
        $request->validate(Article::getRules());

        $filename = time() . '_' . bin2hex(random_bytes(10)) . '.' . $request->image->extension();
        $request->image->move(public_path('img/article'), $filename);
        $attributes = array_merge($request->post(), ['image' => $filename]);

        $article = new Article($attributes);
        $article->save();

        return redirect('articles');
    }

    public function delete(Request $request) {
        return redirect('articles');
    }
}
