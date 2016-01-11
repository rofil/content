<?php

namespace Rofil\Content\Entity\Eloquent;

use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    protected $table = "rofil_content_information";
    protected $guarded = ['id'];

    public function getUser()
    {
        return $this->belongsTo(
            "Rofil\Security\Entity\Eloquent\User",
            "user_id",
            "id"
        );
    }
}