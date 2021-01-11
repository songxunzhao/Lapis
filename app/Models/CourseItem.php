<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseItem extends Model
{
    //
    public function course() {
        return $this->belongsTo('App\Models\Course');
    }
}
