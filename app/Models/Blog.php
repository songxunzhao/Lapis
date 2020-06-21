<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = ['title', 'description', 'thumbnail_url', 'content', 'is_premium', 'status', 'user_id'];

    //
    public function user() {
       return $this->belongsTo('App\Models\User');
    }

    public function tag() {
        return $this->belongsTo('App\Models\Tag');
    }
}
