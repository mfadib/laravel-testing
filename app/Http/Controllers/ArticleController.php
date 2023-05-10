<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Events\ArticleUpdated;
use App\Http\Requests\ArticleRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;


class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::paginate(10);

        return view('articles.index', compact('articles'));
    }
    public function create()
    {
        return view('articles.create');
    }

    public function store(ArticleRequest $request)
    {$validatedData = $request->validated();

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/images');
            $validatedData['image'] = Storage::url($imagePath);
        }

        $article = Article::create($validatedData);

        event(new ArticleUpdated($article));

        return redirect()->route('articles.index')->with('success', 'Article created successfully.');
    }

    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }

    public function update(ArticleRequest $request, Article $article)
    {
        $validatedData = $request->validated();

        if ($request->hasFile('image')) {
            if (File::exists(public_path($article->image))) {
                File::delete(public_path($article->image));
            }
            $imagePath = $request->file('image')->store('public/images');
            $validatedData['image'] = Storage::url($imagePath);
        }

        $article->update($validatedData);

        event(new ArticleUpdated($article));

        return redirect()->route('articles.index')->with('success', 'Article updated successfully.');

    }

    public function destroy(Article $article)
    {
        if ($article->image) {
            if (File::exists(public_path($article->image))) {
                File::delete(public_path($article->image));
            }
        }

        $article->delete();

        return redirect()->route('articles.index');
    }
}
