<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
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
        $objCate = new Category();
        $this->data["listCate"] = $objCate->getAll();
        // dd($this->data);
        return view("admin.category.index", $this->data);
    }

    public function uploadFile($file)
    {
        $fileName = time() . '_' . $file->getClientOriginalName();
        return $file->storeAs('category_image', $fileName, 'public');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.category.create");
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {

        $dataCate = $request->except('hinh_anh');
        if ($request->hasFile('hinh_anh') && $request->file('hinh_anh')->isValid()) {
            $dataCate['hinh_anh'] = $this->uploadFile($request->file('hinh_anh'));
        }
        $objCate = new Category();
        $res = $objCate->insertCategory($dataCate);
        if ($res) {
            return redirect()->route('admin.category.create')->with('success', 'Thêm mới thành công');
        } else {
            return redirect()->route('admin.category.create')->with('error', 'Thêm mới thất bại');
        }
        // dd($request->all());

    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $objCate = new Category();
        $this->data["Cate"] = $objCate->getById($id);
        // dd($this->data);
        if ($this->data["Cate"]) {
            return view("admin.category.show", $this->data);
        }else{
            return redirect()->route("admin.category.index")->with('info','danh mục không tồn tại');
        }

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $objCate = new Category();
        $this->data["Cate"] = $objCate->getById($id);
        // dd($this->data);
        if ($this->data["Cate"]) {
            return view("admin.category.edit", $this->data);
        }else{
            return redirect()->route("admin.category.index")->with('info','danh mục không tồn tại');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $objCate = new Category();
        $check = $objCate->getById($id);
        $imageOld = $check->hinh_anh;
        $dataCate = $request->except("hinh_anh");
        if ($check) {
            if ($request->hasFile('hinh_anh') && $request->file('hinh_anh')->isValid()) {
                $dataCate['hinh_anh'] = $this->uploadFile($request->file('hinh_anh'));
                $res = $objCate->updateCategory($dataCate, $id);
                if ($res) {
                    if (isset($imageOld) && Storage::disk('public')->exists($imageOld)) {
                        Storage::disk('public')->delete($imageOld);
                    }
                }
                return redirect()->route('admin.category.edit', ['id' => $id])->with('success', 'Sửa thành công');
            } else {
                $dataCate['hinh_anh'] = $imageOld;
                $res = $objCate->updateCategory($dataCate, $id);
                return redirect()->route('admin.category.edit', ['id' => $id])->with('success', 'Sửa thành công');
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
        $objCate = new Category();
        $check = $objCate->getById($id);
        $imageOld = $check->hinh_anh;
        if ($check) {
            $res = $objCate->deleteCategory($id);

            if ($res) {
                if (isset($imageOld) && Storage::disk('public')->exists($imageOld)) {
                    Storage::disk('public')->delete($imageOld);
                }
                return redirect()->route('admin.category.index')->with('success', 'Xóa thành công');
            } else {
                return redirect()->route('admin.category.index')->with('error', 'Xóa thất bại');
            }
        } else {
            return redirect()->route('admin.category.index')->with('error', 'Xóa thất bại');
        }
    }
}
