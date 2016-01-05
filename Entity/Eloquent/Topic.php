<?php

namespace Rofil\Content\Entity\Eloquent;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $table   = "rofil_content_topic";
    protected $guarded = ['id'];

    public function getNews()
    {
        return $this->hasMany(
            "Rofil\Content\Entity\Eloquent\News", 
            "topic_id", 
            "id"
        );
    }
}