<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreBannerRequests;

class BannerController extends Controller
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
        $objBan = new Banner();
        $this->data["listBan"] = $objBan->getAll();
        return view("admin.banner.index", $this->data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.banner.create");
    }

    public function uploadFile($file)
    {
        $filename = time() . '_' . $file->getClientOriginalName();
        return $file->storeAs('banner_image', $filename, 'public');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBannerRequests $request)
    {
        $dataBan = $request->except('hinh_anh');
        if ($request->hasFile('hinh_anh') && $request->file('hinh_anh')->isValid()) {
            $dataBan['hinh_anh'] = $this->uploadFile($request->file('hinh_anh'));
        }
        $objBan = new Banner();
        $res = $objBan->insertBanner($dataBan);
        if ($res) {
            return redirect()->route('admin.banner.create')->with('success', 'Thêm mới thành công');
        } else {
            return redirect()->route('admin.banner.create')->with('error', 'Thêm mới thất bại');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $objBan = new Banner();
        $this->data["ban"] = $objBan->getById($id);
        // dd($this->data);
        if ($this->data["ban"]) {
            return view("admin.banner.show", $this->data);
        } else {
            return redirect()->route("admin.banner.index")->with('info', 'banner không tồn tại');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $objBan = new Banner();
        $this->data["ban"] = $objBan->getById($id);
        // dd($this->data);
        if ($this->data["ban"]) {
            return view("admin.banner.edit", $this->data);
        } else {
            return redirect()->route("admin.banner.index")->with('info', 'banner không tồn tại');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $objBan = new Banner();
        $check = $objBan->getById($id);
        $imageOld = $check->hinh_anh;
        $dataBan = $request->except("hinh_anh");
        if ($check) {
            if ($request->hasFile('hinh_anh') && $request->file('hinh_anh')->isValid()) {
                $dataBan['hinh_anh'] = $this->uploadFile($request->file('hinh_anh'));
                $res = $objBan->updateBanner($dataBan, $id);
                if ($res) {
                    if (isset($imageOld) && Storage::disk('public')->exists($imageOld)) {
                        Storage::disk('public')->delete($imageOld);
                    }
                }
                return redirect()->route('admin.banner.edit', ['id' => $id])->with('success', 'Sửa thành công');
            } else {
                $dataBan['hinh_anh'] = $imageOld;
                $res = $objBan->updateBanner($dataBan, $id);
                return redirect()->route('admin.banner.edit', ['id' => $id])->with('success', 'Sửa thành công');
            }
        } else {
            return redirect()->back()->with('error', 'Không tìm thấy banner');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $objBan = new Banner();
        $check = $objBan->getById($id);
        $imageOld = $check->hinh_anh;
        if ($check) {
            $res = $objBan->deleteBanner($id);
            if ($res) {
                if (isset($imageOld) && Storage::disk('public')->exists($imageOld)) {
                    Storage::disk('public')->delete($imageOld);
                }
                return redirect()->route('admin.banner.index')->with('success', 'Xóa thành công');
            } else {
                return redirect()->route('admin.banner.index')->with('error', 'Xóa thất bại');
            }
        } else {
            return redirect()->route('admin.banner.index')->with('error', 'Xóa thất bại');
        }
    }
}
