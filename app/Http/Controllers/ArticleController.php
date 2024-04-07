<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\Storage;

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
        if ($request->missing('image') && !empty($article->image)) {
            unset($rules['image']);
        }

        $request->validate($rules);

        try {
            if ($request->hasFile('image')) {
                if (!$request->file('image')->isValid()) {
                    throw new \Exception(__('errors.errorUpload'));
                }

                $file = $request->file('image');
                $filename = $file->hashName();
                $file->storeAs('articles', $filename, 'public');
                $request->merge(['image' => $filename]);

                if (!empty($article->image)) {
                    Storage::disk('public')->delete('articles/' . $article->image);
                }
            }

            $article->fill($request->post());
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
            Storage::disk('public')->delete('articles/' . $article->image);
            $article->delete();

            return redirect('articles');
        } catch (\Exception $e) {
            report($e->getMessage());
            return back()->withError(__('errors.error'));
        }
    }
}
