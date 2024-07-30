<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    protected $table = "danh_mucs";

    protected $fillable = [
        'id',
        'ten_danh_muc',
        'hinh_anh',
        'mo_ta',
        'created_at',
        'updated_at',
    ];
    public function getAll(){
       $query = Category::all();
       return $query;
    }

    public function getById($id){
        $query = Category::query()->find($id);
        return $query;
    }

    public function insertCategory($params){
        $params['created_at'] = date('Y-m-d H:i:s');
        $res = Category::query()->create($params);
        return $res;
    }

    public function updateCategory($params, $id){
        $res = Category::query()->find($id)->update($params);
        return $res;
    }

    public function deleteCategory($id){
        $res = Category::query()->find($id)->delete();
        return $res;
    }


}
