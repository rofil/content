<?php

namespace Rofil\Content\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TopicFormRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required',
            // 'description'  => 'required'
        ];
    }
}