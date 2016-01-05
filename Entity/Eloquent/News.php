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
            "Rofil\Content\Entity\Eloquent\NewsCategory",
            "rofil_content_categories_news",
            "news_id",
            "category_id"
        );
    }

    public function getUser()
    {
        return $this->belongsTo(
            "Rofil\Security\Entity\Eloquent\User",
            "user_id",
            "id"
        );
    }

    public function getTopic()
    {
        return $this->belongsTo(
            "Rofil\Content\Entity\Eloquent\Topic",
            "topic_id",
            "id"
        );
    }
}