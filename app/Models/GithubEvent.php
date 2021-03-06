<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GithubEvent extends Model
{
    protected $guarded = [];

    protected $dates = ['event_created_at'];

    public function scopeRecent()
    {
        return $this->orderBy('event_created_at', 'desc');
    }
}
