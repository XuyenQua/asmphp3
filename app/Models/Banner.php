<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $table = "banners";

    protected $fillable = [
        'id',
        'ten_banner',
        'hinh_anh',
        'vi_tri',
        'created_at',
        'updated_at',
    ];

    public function getAll(){
        $query = Banner::all();
        return $query;
    }
    public function getById($id){
        $query = Banner::find($id);
        return $query;
    }
    
    public function insertBanner($params){
        $res = Banner::create($params);
        return $res;
    }

    public function updateBanner($params,$id){
        $res = Banner::find($id)->update($params);
        return $res;
    }

    public function deleteBanner($id){
        $res = Banner::find($id)->delete();
        return $res;
    }


}
