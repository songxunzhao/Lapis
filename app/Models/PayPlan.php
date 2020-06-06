<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use MyCLabs\Enum\Enum;

class PeriodUnit extends Enum {
    const MONTH = 'MONTH';
    const YEAR = 'YEAR';
}

class PayPlan extends Model
{
    //
}
