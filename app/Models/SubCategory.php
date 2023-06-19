<?php

namespace App\Models;

use App\Models\SubSubCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubCategory extends Model
{
    use HasFactory;
    protected $table = 'sub_categories';

    protected $fillable = [
        'name',
        'description',
        'status',
        'category_id'
    ];


    public function category()
    {
        return $this->belongsTo(Catergory::class, 'category_id', 'id');
    }

    public function SubSubCategory(){
        return $this->hasMany(SubSubCategory::class,'sub_category_id', 'id');
    }

}
