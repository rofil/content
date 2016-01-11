<?php

namespace Rofil\Content\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InformationFormRequest extends FormRequest
{
    public function authorize()
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