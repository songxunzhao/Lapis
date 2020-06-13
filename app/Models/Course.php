<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    //
    public function user() {
        return $this->belongsTo('App\Model\User');
    }
}
