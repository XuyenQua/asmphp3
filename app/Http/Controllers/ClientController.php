<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        
        return view('client.home');
    }

    
}
