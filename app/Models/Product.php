<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'san_phams';

    protected $fillable = [
        'danh_muc_id',
        'ten_san_pham',
        'gia',
        'so_luong',
        'hinh_anh',
        'mo_ta_ngan',
        'chi_tiet_san_pham',
        'luot_xem',
        'created_at',
        'updated_at',
    ];


    public function loadAllCategory()
    {
        return $this->belongsTo(Category::class, 'danh_muc_id');
    }

    public function getAll()
    {
        $query = Product::query()->with('loadAllCategory')->latest('id')->get();
        return $query;
    }

    public function getProductById($id)
    {
        $query = Product::query()->with('loadAllCategory')->find($id);
        return $query;
    }

    public function insertProduct($params)
    {
        $res = Product::create($params);
        return $res;
    }
    public function updateProduct($params, $id)
    {
        $res = Product::find($id)->update($params);
        return $res;
    }
    public function deleteProduct($id)
    {
        $res = Product::destroy($id);
        return $res;
    }
}
