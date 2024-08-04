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
        'khuyen_mais.id',
        'ten_khuyen_mai',
        'ma_khuyen_mai',
        'loai_khuyen_mai',
        'gia_tri',
        'so_luong',
        'ngay_bat_dau',
        'ngay_ket_thuc',
        'mo_ta',
        'khuyen_mais.created_at as created_at',
        'khuyen_mais.updated_at as updated_at',
    ] ;

    public function getAll(){
        $this->fillable[] = 'trang_thais.ten_trang_thai as ten_trang_thai';
        $query = Db::table($this->table)->select($this->fillable)->join('trang_thais','khuyen_mais.trang_thai_id','=','trang_thais.id')->get();
        return $query;
    }

    public function getById($id){
        $this->fillable[] = 'trang_thais.ten_trang_thai as ten_trang_thai';
        $query = Db::table($this->table)->select($this->fillable)->join('trang_thais','khuyen_mais.trang_thai_id','=','trang_thais.id')->where('khuyen_mais.id',$id)->first();
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
