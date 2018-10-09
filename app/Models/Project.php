<?php

namespace App\Models;

use App\Services\ParseDown;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $guarded = [];

    public function getDescriptionAttribute($original)
    {
        return (new Parsedown())->text($original);
    }

    public function getMarkdownAttribute()
    {
        return $this->getOriginal('description');
    }

    /**
     * @param array $data
     * @return $this
     */
    public function addProject(array $data) : Project
    {
        $this->slug = $data['slug'];
        $this->title = $data['title'];
        $this->description = $data['description'];
        $this->url = $data['url'];
        $this->my_role = $data['my_role'];
        $this->tools_used = $data['tools_used'];
        $this->published_at = $data['published_at'];

        $this->save();

        return $this;
    }
}
