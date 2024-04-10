<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order_details extends Model
{
    use HasFactory;
    protected $table = "order_details";
    protected $fillable = [
        'id',
        'order_id',
        'product_id',
        'price',
        'num',
        'total_money',

    ];


}
