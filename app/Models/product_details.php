<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product_details extends Model
{
    use HasFactory;

    protected $table = "product_details";

    protected $fillable = [
        'id',
        'product_id',
        'color',
        'quantity', // Xóa dấu phẩy ở đây
    ];
}
