<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_item extends Model
{
    protected $table = 'order_item';
    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    ];
}
