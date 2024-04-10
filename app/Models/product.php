<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $table="product";
    protected $fillable=['id', 'name','title','category_id','price','discount','thumbnail','description', 'thumbnail2','updated_at', 'created_at', 'delete','stock_quantity','quantity'];
    
    public function search($keyword, $minPrice, $maxPrice, $startDate, $endDate, $orderBy, $orderDirection,$quantity)
    {
        $query = $this->where(function ($query) use ($keyword, $minPrice, $maxPrice, $startDate, $endDate) {
            $query->where('name', 'like', "%$keyword%")
                  ->orWhere('title', 'like', "%$keyword%")
                  ->orWhere('description', 'like', "%$keyword%")
                  ->orWhereHas('category', function ($query) use ($keyword) {
                      $query->where('name', 'like', "%$keyword%");
                  });

            if ($minPrice !== null) {
                $query->where('price', '>=', $minPrice);
            }

            if ($maxPrice !== null) {
                $query->where('price', '<=', $maxPrice);
            }

            if ($startDate !== null && $endDate !== null) {
                $query->whereBetween('created_at', [$startDate, $endDate]);
            }
        });

        if ($orderBy && $orderDirection) {
            $query->orderBy($orderBy, $orderDirection);
        }

        return $query->paginate($quantity);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);// Thay 'categoryId' bằng khóa ngoại thực sự trong bảng products tham chiếu đến bảng categories
    }
    

   
}
