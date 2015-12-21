<?php

namespace Rofil\Content\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsFormRequest extends FormRequest
{
    public function authorized()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required',
            'body'  => 'required'
        ];
    }
}