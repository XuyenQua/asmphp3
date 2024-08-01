<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreProductRequest;

class ProductController extends Controller
{
    private $data;
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->data = [];
    }
    public function index()
    {
        $objPro = new Product();
        $this->data['listPro'] = $objPro->getAll();
        // dd($this->data);
        return view('admin.product.index', $this->data);
    }

    public function upLoadFile($file){
        $fileName = time().'_'.$file->getClientOriginalName();
        return $file->storeAs('product_image', $fileName,'public');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $objCate = new Category();
        $this->data['listCate'] = $objCate->getAll();
        return view('admin.product.create',$this->data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        
        $dataPro = $request->except('hinh_anh');
        if ($request->hasFile('hinh_anh') && $request->file('hinh_anh')->isValid()) {
            $dataPro['hinh_anh'] = $this->upLoadFile($request->file('hinh_anh'));
        }
        $objPro = new Product();
        $res = $objPro->insertProduct($dataPro);
        if ($res) {
            return redirect()->route('admin.product.create')->with('success', 'Thêm mới thành công');
        } else {
            return redirect()->route('admin.product.create')->with('error', 'Thêm mới thất bại');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $objPro = new Product();
        $this->data['pro'] = $objPro->getProductById($id);
        // dd($this->data);
        if($this->data['pro']){
            return view('admin.product.show',$this->data);
        }else{
            return redirect()->route('admin.product.index')->with('info','Không tìm thấy sản phẩm');
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {   
        $objCate = new Category();
        $this->data['listCate']= $objCate->getAll();
        $objPro = new Product();
        $this->data['pro'] = $objPro->getProductById($id);

        // dd($this->data);
        if($this->data['pro']){
            return view('admin.product.edit',$this->data);
        }else{
            return redirect()->route('admin.product.index')->with('info','Không tìm thấy sản phẩm');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $objPro = new Product();
        $check = $objPro->getProductById($id);
        $imageOld = $check->hinh_anh;
        $dataPro = $request->except("hinh_anh");
        if ($check) {
            if ($request->hasFile('hinh_anh') && $request->file('hinh_anh')->isValid()) {
                $dataPro['hinh_anh'] = $this->uploadFile($request->file('hinh_anh'));
                $res = $objPro->updateProduct($dataPro, $id);
                if ($res) {
                    if (isset($imageOld) && Storage::disk('public')->exists($imageOld)) {
                        Storage::disk('public')->delete($imageOld);
                    }
                }
                return redirect()->route('admin.product.edit', ['id' => $id])->with('success', 'Sửa thành công');
            } else {
                $dataPro['hinh_anh'] = $imageOld;
                $res = $objPro->updateProduct($dataPro, $id);
                return redirect()->route('admin.product.edit', ['id' => $id])->with('success', 'Sửa thành công');
            }
        } else {
            return redirect()->back()->with('error', 'Không tìm thấy danh mục');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $objPro = new Product();
        $check = $objPro->getProductById($id);
        $imageOld = $check->hinh_anh;
        if ($check) {
            $res = $objPro->deleteProduct($id);
            if ($res) {
                if (isset($imageOld) && Storage::disk('public')->exists($imageOld)) {
                    Storage::disk('public')->delete($imageOld);
                }
                return redirect()->route('admin.product.index')->with('success', 'Xóa thành công');
            } else {
                return redirect()->route('admin.product.index')->with('error', 'Xóa thất bại');
            }
        } else {
            return redirect()->route('admin.product.index')->with('error', 'Xóa thất bại');
        }
    }
}
