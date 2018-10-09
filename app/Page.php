<?php

namespace App;

use App\Services\ParseDown;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $guarded = [];

    public function scopePage($query, $page)
    {
        return $query->whereSlug($page);
    }
    
    public function getContentAttribute($original)
    {
        return (new Parsedown())->text($original);
    }

    public function getMarkdownAttribute()
    {
        return $this->getOriginal('content');
    }

    public function addPage(array $data)
    {
        $this->slug = $data['slug'];
        $this->title = $data['title'];
        $this->content = $data['content'];
        $this->published_at = $data['published_at'];

        $this->save();

        return $this;
    }
}
