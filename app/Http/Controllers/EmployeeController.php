<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequests;

class EmployeeController extends Controller
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
        $this->data['listUser'] = $objUser->getEmployeeAll();
        return view('admin.employee.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.employee.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RegisterRequests $request)
    {
        $objUser = new User();
        $res = $objUser->insertDataEmployee($request->all());
        if ($res) {
           return redirect()->route('admin.employee.create')->with('success','Thêm mới thành công');
        } else {
            return redirect()->route('admin.employee.create')->with('error','Thêm mới thất bại');
        }
        
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
            return view("admin.employee.show", $this->data);
        } else {
            return redirect()->route("admin.employee.index")->with('info', 'User không tồn tại');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $objUser = new User();
        $check = $objUser->getById($id);
        if ($check) {
            $res = $objUser->deleteUser($id);
            return redirect()->route('admin.employee.index')->with('success', 'Xóa thành công');
        } else {
            return redirect()->route('admin.employee.index')->with('error', 'Xóa thất bại');
        }
    }
}
