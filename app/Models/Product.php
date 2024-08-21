<?php

namespace App\Models;


use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public function loadDataWithPager()
    {

        $query = Product::query()
            ->with('loadAllCategory')
            ->latest('id')
            ->paginate(10);
        return $query;
    }
    public function loadLatestProducts()
    {

        $query = Product::query()
            ->with('loadAllCategory')
            ->latest('id')
            ->take(9)
            ->get()
            ->toArray();
        return $query;
    }

    public function loadHotProducts()
    {

        $query = Product::query()
            ->with('loadAllCategory')
            ->latest('luot_xem')
            ->take(9)
            ->get()
            ->toArray();
        return $query;
    }


    public function getProductById($id)
    {
        $query = Product::query()->with('loadAllCategory')->find($id);
        return $query;
    }
    public function getProductByCategoryId($id)
    {
        $query = Product::query()->with('loadAllCategory')->where('danh_muc_id', $id)->latest('id')->take(4)->get();
        return $query;
    }
    public function getAllProductsByCategoryId($id){
        $query = Product::query()->with('loadAllCategory')->where('danh_muc_id', $id)->latest('id')->paginate(10);
        return $query;
    }

    public function upViewProduct($id){
        Product::where('id', $id)->increment('luot_xem');
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
