<?php

namespace App\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\Article;

class ArticleUpdated
{
    use Dispatchable, SerializesModels;
    
    public $article;

    public function __construct(Article $article)
    {
        $this->article = $article;
    }
    
}
