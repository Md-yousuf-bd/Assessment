<?php

namespace App\Models;

use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Catergory extends Model
{
    use HasFactory;
    protected $table = 'catergories';

    protected $fillable = [
        'name',
        'description',
        'status',
    ];

    public function SubCategory(){
        return $this->hasMany(SubCategory::class,'category_id', 'id');
    }
}
