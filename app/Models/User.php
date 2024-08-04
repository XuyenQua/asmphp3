<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'nguoi_dungs';
    protected $guard = 'nguoi_dungs';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'vai_tro_id',
        'ten_nguoi_dung',
        'mat_khau',
        'email',
        'so_dien_thoai',
        'dia_chi',
        'created_at',
        'updated_at',
        
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'mat_khau',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'mat_khau' => 'hashed',
    ];

    public function getAuthPassword()
    {
        return $this->mat_khau;
    }

    public function insertDataUser($params){
        $params['vai_tro_id'] = 1;
        $res = User::query()->create($params);
        return $res;
    }

    public function getAll(){
        $query = User::query()
        ->select('nguoi_dungs.*', 'vai_tros.ten_vai_tro as ten_vai_tro')
        ->join('vai_tros', 'nguoi_dungs.vai_tro_id', '=', 'vai_tros.id')
        ->where('vai_tro_id', '=', 1)->get();
        return $query;
    }

    public function getEmployeeAll(){
        $query = User::query()
        ->select('nguoi_dungs.*', 'vai_tros.ten_vai_tro as ten_vai_tro')
        ->join('vai_tros', 'nguoi_dungs.vai_tro_id', '=', 'vai_tros.id')
        ->where('vai_tro_id', '=', 2)->get();
        return $query;
    }


    public function getById($id){
        $query = User::query()
        ->select('nguoi_dungs.*', 'vai_tros.ten_vai_tro as ten_vai_tro')
        ->join('vai_tros', 'nguoi_dungs.vai_tro_id', '=', 'vai_tros.id')
        ->find($id);
        return $query;
    }

    public function updateUser($params, $id){

    }

    public function deleteUser($id){
        $res = User::query()->find($id)->delete();
        return $res;
    }

    public function insertDataEmployee($params){
        $params['vai_tro_id'] = 2;
        $res = User::query()->create($params);
        return $res;
    }

}
