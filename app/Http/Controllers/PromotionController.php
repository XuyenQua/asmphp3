<?php

namespace App\Http\Controllers;

use App\Models\Promotion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePromotionRequests;


class PromotionController extends Controller
{

    private $data;
    public function __construct()
    {
        $this->data = [];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $objProm = new Promotion();
        $this->data["listProm"] = $objProm->getAll();
        // dd($this->data);
        return view("admin.promotion.index", $this->data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.promotion.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePromotionRequests $request)
    {   
        $objProm = new Promotion();
        $res = $objProm->createPromotion($request->all());
        if ($res) {
           return redirect()->route('admin.promotion.create')->with('success','Thêm mới thành công');
        } else {
            return redirect()->route('admin.promotion.create')->with('error','Thêm mới thất bại');
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $objProm = new Promotion();
        $this->data["prom"] = $objProm->getById($id);
        // dd($this->data);
        if ($this->data["prom"]) {
            return view("admin.promotion.show", $this->data);
        } else {
            return redirect()->route("admin.promotion.index")->with('info', 'khuyến mãi không tồn tại');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $objProm = new Promotion();
        $this->data["prom"] = $objProm->getById($id);
        // dd($this->data);
        if ($this->data["prom"]) {
            return view("admin.promotion.edit", $this->data);
        } else {
            return redirect()->route("admin.promotion.index")->with('info', 'khuyến mãi không tồn tại');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StorePromotionRequests $request, int $id)
    {
        $objProm = new Promotion();
        $res = $objProm->updatePromotion($request->all(), $id);
        if ($res) {
            return redirect()->route('admin.promotion.edit', $id)->with('success', 'Cập nhật thành công');
        } else {
            return redirect()->route('admin.promotion.edit', $id)->with('error', 'Cập nhật thất bại');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $objProm = new Promotion();
        $check = $objProm->getById($id);
        if ($check) {
            $res = $objProm->deletePromtion($id);
            return redirect()->route('admin.promotion.index')->with('success', 'Xóa thành công');
        } else {
            return redirect()->route('admin.promotion.index')->with('error', 'Xóa thất bại');
        }
    }
}
