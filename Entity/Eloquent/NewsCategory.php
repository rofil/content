<?php

namespace Rofil\Content\Entity\Eloquent;

use Illuminate\Database\Eloquent\Model;

class NewsCategory extends Model
{
    protected $table = "rofil_content_news_categories";
    protected $guarded = ['id'];

    public function getNews()
    {
        return $this->belongsToMany(
            "Rofil\Content\Entity\Eloquent\News",
            "rofil_content_categories_news",
            "category_id",
            "news_id"
        );
    }
}