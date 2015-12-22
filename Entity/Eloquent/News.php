<?php

namespace Rofil\Content\Entity\Eloquent;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = "rofil_content_news";
    protected $guarded = ['id'];

    public function getCategories()
    {
        return $this->belongsToMany(
            "Rofil\Content\Entity\Eloquent\Categories",
            "rofil_content_categories_news",
            "news_id",
            "id"
        );
    }
}