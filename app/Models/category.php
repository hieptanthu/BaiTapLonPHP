<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class category extends Model
{
    use HasFactory;
    
    protected $table = "category";
    protected $fillable = [
        'name',
        'id' ,
        'delete',
    ];

   
    
    public static   function onCategory() {
        $category = DB::select("SELECT * FROM `category`");
        return $category;
    }
   
  
}
