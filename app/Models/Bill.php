<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;
    protected $table = "don_hangs";
    protected $fillable = [

    ];

    public function getAll(){

    }

    public function getById($id){

    }

    public function insertBill($params){

    }

    public function insertDetailBill($params){

    }

    public function updateBill($params, $id){

    }

    public function deleteBill($id){

    }

}
