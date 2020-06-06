<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use MyCLabs\Enum\Enum;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'user_plan', 'user_level', 'tags'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}

class UserLevel extends Enum
{
    const NORMAL='NORMAL';
    const CONTENT_EDITOR='CONTENT_EDITOR';
    const CONTENT_INSPECTOR='CONTENT_INSPECTOR';
    const ADMIN='ADMIN';
}