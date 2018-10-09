<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class PageRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'slug' => str_slug($this->get('title')),
            'published_at' => $this->get('published') ? date('Y-m-d H:i:s') : null
        ]);

    }

    public function rules()
    {
        if($this->method() == 'POST')
            return $this->createRules();
        else
            return $this->updateRules();
    }

    protected function createRules()
    {
        return [
            'slug' => 'required|unique:pages',
            'title' => 'required',
            'content' => 'required',
            'published_at' => 'date_format:"Y-m-d H:i:s"|nullable'
        ];
    }

    protected function updateRules()
    {
        return [
            'title' => 'required',
            'content' => 'required',
//            'published_at' => 'date_format:"Y-m-d H:i:s"|nullable'
        ];
    }

}
