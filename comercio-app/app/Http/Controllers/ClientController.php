<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function viewhomepage()
    {
        return view('client.home');
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

    public function   viewproductdetailspage()
    {
        return view('client.productdetails');
    }

    public function   viewsearchproduct()
    {
        return view('client.searchproduct');
    }
}
