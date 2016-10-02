<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'order';
    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    ];
}
