<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClientController extends Controller
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
        $this->data['listCate'] = $objCate->getAll();
        // dd($this->data);
        $objBan = new Banner();
        $this->data['listBannerTop'] = $objBan->getByViTri('top');
        $this->data['listBannerBottom'] = $objBan->getByViTri('bottom');
        

        $objPro = new Product();
        $this->data['listPro'] = $objPro->getAll();

        return view('client.home', $this->data);
    }
    public function cart()
    {   
        $objCate = new Category();
        $this->data['listCate'] = $objCate->getAll();
        return view('client.cart', $this->data);
    }
    public function checkout()
    {   
        $objCate = new Category();
        $this->data['listCate'] = $objCate->getAll();
        return view('client.checkout', $this->data);
    }

    public function shop()
    {   
        $objCate = new Category();
        $this->data['listCate'] = $objCate->getAll();

        return view('client.shop', $this->data);
    }
    public function client_category(int $id)
    {   
        $objCate = new Category();
        $this->data['listCate'] = $objCate->getAll();
        return view('client.shop', $this->data);
    }

    public function pro_detail(int $id)
    {   
        $objCate = new Category();
        $this->data['listCate'] = $objCate->getAll();
        return view('client.pro_detail', $this->data);
    }

    public function client_login()
    {   
        
        return view('client.client_login');
    }

    





    
}
