<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $fillable = [
        'user_id',
        'account_type_id',
        'name',
        'initial_balance',
        'current_balance',
        'currency_code',
        'is_active'
    ];
}