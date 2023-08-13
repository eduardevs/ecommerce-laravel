<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SliderController extends Controller
{

    public function viewsliderspage()
    {
        return view('admin.sliders');
    }

    public function vieweditslider()
    {
        return view('admin.editslider');
    }

    public function viewaddslider()
    {
        return view('admin.addslider');
    }

    public function viewservicespage()
    {
        return view('admin.services');
    }

    public function viewaddservicespage()
    {
        return view('admin.addservice');
    }

    public function vieweditservicespage()
    {
        return view('admin.editservice');
    }
}
