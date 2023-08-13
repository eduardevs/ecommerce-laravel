<?php

namespace App\Http\Controllers;

use App\Models\Product;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function viewproductspage()
    {
        return view('admin.products');
    }
    public function viewaddproduct()
    {
        return view('admin.addproduct');
    }
    public function vieweditproduct()
    {
        return view('admin.editproduct');
    }
    public function vieworderspage()
    {
        return view('admin.orders');
    }
}
