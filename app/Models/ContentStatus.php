<?php


namespace App\Models;


use MyCLabs\Enum\Enum;

class ContentStatus extends Enum
{
    const DRAFT = 'DRAFT';
    const PUBLISHED = 'PUBLISHED';
    const DELETED = 'DELETED';
}