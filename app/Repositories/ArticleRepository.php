<?php 

namespace App\Repositories;

use App\Models\Article;
use Illuminate\Support\Facades\Cache;

class ArticleRepository
{
    public function rebuildCache()
    {
        $articles = Article::all();

        Cache::put('articles', $articles);
    }
}
