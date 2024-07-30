<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'san_phams';

    public function loadAllCategory(){
        return $this->belongsTo(Category::class, 'danh_muc_id');
    }

    public function getAll(){
        $query = Product::query()->with('loadAllCategory')->latest('id')->get();
        return $query;
    }


}
