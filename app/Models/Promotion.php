<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Promotion extends Model
{
    use HasFactory;

    protected $table = 'khuyen_mais';

    protected $fillable = [
        'id',
        'ten_khuyen_mai',
        'ma_khuyen_mai',
        'loai_khuyen_mai',
        'gia_tri',
        'so_luong',
        'ngay_bat_dau',
        'ngay_ket_thuc',
        'mo_ta',
        'created_at',
        'updated_at',
    ] ;

    public function getAll(){
        $query = Db::table($this->table)->select($this->fillable)->get();
        return $query;
    }

    public function getById($id){
        $query = Db::table($this->table)->select($this->fillable)->where('id',$id)->first();
        return $query;
    }

    public function deletePromtion($id){
        $res = Promotion::find($id)->delete();
        return $res;
    }
    
    public function createPromotion($params){
        $res = Promotion::create($params);
        return $res;
    }

    public function updatePromotion($params, $id){
        $res = Promotion::query()->find($id)->update($params);
        return $res;
    }

}
