<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'product';
    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    ];
}
