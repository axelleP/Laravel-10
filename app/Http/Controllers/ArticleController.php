<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function showList() {
        $articles = Article::simplePaginate(5);
        return view('article.list', ['articles' => $articles]);
    }

    public function showView(int $id) {
        $article = Article::find($id);
        return view('article.view', ['article' => $article]);
    }

    public function showForm(int $id = null) {
        $article = (!empty($id)) ? Article::find($id) : new Article();
        return view('article.form', ['article' => $article]);
    }

    public function save(Request $request, int $id = null) {
        $article = (!empty($id)) ? Article::find($id) : new Article();

        $rules = Article::getRules();
        if (empty($request->image) && !empty($article->image)) {
            unset($rules['image']);
        }

        $request->validate($rules);

        try {
            // throw new Exception('save() : test exception');

            $attributes = $request->post();
            if (!empty($request->image)) {
                if (!empty($article->image)) {
                    unlink(public_path('img/article/' . $article->image));
                }

                $filename = time() . '_' . bin2hex(random_bytes(10)) . '.' . $request->image->extension();
                $request->image->move(public_path('img/article'), $filename);
                $attributes = array_merge($request->post(), ['image' => $filename]);
            }

            $article->fill($attributes);
            $article->save();

            $flashMessage = (!empty($id)) ? __('article.successful_update') : __('article.successful_create');
            return redirect('articles')->with('success', $flashMessage);
        } catch (\Exception $e) {
            report($e->getMessage());
            return back()->withError(__('errors.error'));
        }
    }

    public function delete(int $id) {
        try {
            // throw new Exception('delete() : test exception');
            $article = Article::find($id);
            unlink(public_path('img/article/' . $article->image));
            $article->delete();

            return redirect('articles');
        } catch (\Exception $e) {
            report($e->getMessage());
            return back()->withError(__('errors.error'));
        }
    }
}
