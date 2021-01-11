<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use MyCLabs\Enum\Enum;

class TransactionStatus extends Enum
{
    const PAID='PAID';
    const REFUND='REFUND';
}


class Transaction extends Model
{
    //
}
