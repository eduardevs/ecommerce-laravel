<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Logoimage;

class AdminController extends Controller
{
    public function viewadmindashboard()
    {
        return view('admin.dashboard');
    }

    public function viewadminsettings()
    {
        $logoImg = Logoimage::first();

        return view('admin.settings')->with("logoimage", $logoImg);
    }

    public function viewadminsize()
    {
        return view('admin.size');
    }

    public function  viewaddsizepage()
    {
        return view('admin.addsize');
    }

    public function vieweditsizepage()
    {
        return view('admin.editsize');
    }

    public function  viewcolorpage()
    {
        return view('admin.color');
    }

    public function  viewaddcolorpage()
    {
        return view('admin.addcolor');
    }

    public function vieweditcolorpage()
    {
        return view('admin.editcolor');
    }

    public function viewcountrypage()
    {
        return view('admin.country');
    }
    public function  vieweditcountrypage()
    {
        return view('admin.editcountry');
    }

    public function viewaddcountrypage()
    {
        return view('admin.addcountry');
    }

    public function viewshippingpage()
    {
        return view('admin.shippingcost');
    }

    public function vieweditshippingpage()
    {
        return view('admin.editshippingcost');
    }


    public function viewfaqpage()
    {
        return view('admin.faq');
    }

    public function viewaddfaq()
    {
        return view('admin.addfaq');
    }

    public function vieweditfaq()
    {
        return view('admin.editfaq');
    }

    public function viewcustomerspage()
    {
        return view('admin.customers');
    }

    public function viewsettingspage()
    {
        return view('admin.pagesettings');
    }

    public function viewsocialmedia()
    {
        return view('admin.socialmedia');
    }

    public function viewsubscriberspage()
    {
        return view('admin.subscriber');
    }

    public function viewprofilepage()
    {
        return view('admin.profile');
    }
}
