<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
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
            'slug' => 'required|unique:projects',
            'title' => 'required|min:3|max:255',
            'url' => 'required|min:1|max:255',
            'description' => 'required|min:50',
            'my_role' => 'required|min:20|max:255',
            'tools_used' => 'required|min:10|max:255',
            'published_at' => 'date_format:"Y-m-d H:i:s"|nullable'
        ];
    }

    protected function updateRules()
    {
        return [
            'url' => 'required|min:1|max:255',
            'description' => 'required|min:50',
            'my_role' => 'required|min:20|max:255',
            'tools_used' => 'required|min:10|max:255',
            'published_at' => 'date_format:"Y-m-d H:i:s"|nullable'
        ];
    }
}
