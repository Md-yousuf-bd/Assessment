<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;


    public function category()
    {
        return $this->belongsTo(Catergory::class, 'category_id', 'id');
    }
    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class, 'sub_category_id', 'id');
    }
    public function subSubCategory()
    {
        return $this->belongsTo(SubSubCategory::class, 'sub_sub_category_id', 'id');
    }

}
