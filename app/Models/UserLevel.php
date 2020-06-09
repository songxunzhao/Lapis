<?php

namespace App\Models;

use MyCLabs\Enum\Enum;

class UserLevel extends Enum
{
    const NORMAL='NORMAL';
    const CONTENT_EDITOR='CONTENT_EDITOR';
    const CONTENT_INSPECTOR='CONTENT_INSPECTOR';
    const ADMIN='ADMIN';
}