<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $objPro = new Product();
        $this->data['pro'] = $objPro->getProductById($id);
        // dd($this->data);
        return view('admin.product.show',$this->data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
