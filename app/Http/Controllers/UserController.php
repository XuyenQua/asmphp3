<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequests;
use App\Http\Requests\RegisterRequests;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{   
    private $data;
    public function __construct(){
        $this->data = [];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $objUser = new User();
        $this->data['listUser'] = $objUser->getAll();
        return view('admin.user.index', $this->data);
    }

   

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $objUser = new User();
        $this->data["user"] = $objUser->getById($id);
        // dd($this->data);
        if ($this->data["user"]) {
            return view("admin.user.show", $this->data);
        } else {
            return redirect()->route("admin.user.index")->with('info', 'User không tồn tại');
        }
    }

    public function register()
    {
        return view('admin.register');
    }
    public function postRegister(RegisterRequests $request)
    {
        
        $objUser = new User();
        $request->merge(['mat_khau' => Hash::make($request->mat_khau)]);
        $res = $objUser->insertDataUser($request->all());
        if ($res) {
            return redirect()->back()->with('success', 'đăng ký thành công');
        } else {
            return redirect()->back()->with('error', 'đăng ký thất bại');
        }
       
    }

    public function login()
    {
        return view('admin.login');
    }
    public function postLogin(LoginRequests $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->mat_khau])) {
            return redirect()->route('admin.index');
        } else {
            return redirect()->route('login')->with('error', 'TK hoac mat khau khong dung');
        }
    }

    public function logout()
    {
        //        dd(123);
        Auth::logout();
        return redirect()->route('login');
    }
}
