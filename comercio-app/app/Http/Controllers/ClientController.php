<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ClientController extends Controller
{
    public function viewhomepage()
    {
        $featuredproducts = Product::get();
        return view('client.home')->with("featuredproducts", $featuredproducts);
    }
    public function viewaboutpage()
    {
        return view('client.about');
    }

    public function viewfaqpage()
    {
        return view('client.faq');
    }

    public function viewcontactpage()
    {
        return view('client.contact');
    }

    public function viewloginpage()
    {
        return view('client.login');
    }

    public function viewregisterpage()
    {
        return view('client.register');
    }

    public function viewcartpage()
    {
        return view('client.cart');
    }

    public function viewcheckoutpage()
    {
        return view('client.checkout');
    }

    public function viewdashboardpage()
    {
        return view('client.dashboard');
    }

    public function viewprofilepage()
    {
        return view('client.profile');
    }

    public function  viewbillingpage()
    {
        return view('client.billingdetails');
    }

    public function  viewloginpasswordpage()
    {
        return view('client.updatepassword');
    }

    public function  vieworderspage()
    {
        return view('client.orders');
    }

    public function   viewproductbycategorypage()
    {
        return view('client.productbycategory');
    }

    public function   viewproductdetailspage(Request $request, $id)
    {
        $product = Product::find($id);

        return view('client.productdetails')->with('productdetail', $product);
    }

    public function   viewsearchproduct()
    {
        return view('client.searchproduct');
    }

    public function addproductcart(Request $request, $id)
    {
        $product = Product::find($id);

        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $request->input('size_id'), $request->input('color_id'), $request->input('p_qty'));

        Session::put('cart', $cart);
        Session::put('topCart', $cart->items);

        return back();
    }
}
