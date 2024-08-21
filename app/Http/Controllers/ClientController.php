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
        $this->data['listBannerMiddle'] = $objBan->getByViTri('middle');
        $this->data['listBannerBottom'] = $objBan->getByViTri('bottom');


        $objPro = new Product();
        $this->data['listPro'] = $objPro->getAll();

        $latestPro = $objPro->loadLatestProducts();
        $this->data['latestProducts'] = array_chunk($latestPro, 3);

        $hotPro = $objPro->loadHotProducts();
        $this->data['hotProducts'] = array_chunk($hotPro, 3);

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

        $objPro = new Product();
        $this->data['listPro'] = $objPro->loadDataWithPager();

        $latestPro = $objPro->loadLatestProducts();
        $this->data['latestProducts'] = array_chunk($latestPro, 3);

       

        // dd($this->data['latestProducts']);
        // dd($this->data);

        return view('client.shop', $this->data);
    }
    public function client_category(int $id)
    {
        $objCate = new Category();
        $this->data['listCate'] = $objCate->getAll();
        $this->data['cate'] = $objCate->getById($id);

        $objPro = new Product();
        $this->data['listPro'] = $objPro->getAllProductsByCategoryId($id);
        $latestPro = $objPro->loadLatestProducts();

        $this->data['latestProducts'] = array_chunk($latestPro, 3);

        return view('client.category', $this->data);
    }

    public function pro_detail(int $id)
    {
        $objCate = new Category();
        $this->data['listCate'] = $objCate->getAll();

        $objPro = new Product();
        $objPro->upViewProduct($id);
        $this->data['pro'] = $objPro->getProductById($id);
        $this->data['relatedProduct'] = $objPro->getProductByCategoryId($this->data['pro']->danh_muc_id);
        

        // dd( $this->data['relatedProduct']);
        return view('client.pro_detail', $this->data);
    }

    public function client_login()
    {

        return view('client.client_login');
    }
}
