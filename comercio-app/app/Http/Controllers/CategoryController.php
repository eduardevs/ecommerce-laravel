<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function viewtoplevelcategory()
    {
        return view('admin.toplevelcategory');
    }

    public function viewaddtoplevelcategory()
    {
        return view('admin.addtoplevelcategory');
    }

    public function viewedittoplevelcategory()
    {
        return view('admin.edittoplevelcategory');
    }

    public function    viewmidlevelcategory()
    {
        return view('admin.midlevelcategory');
    }

    public function
    viewaddmidlevelcategory()
    {
        return view('admin.addmidlevelcategory');
    }

    public function
    vieweditmidlevelcategory()
    {
        return view('admin.editmidlevelcategory');
    }


    public function viewendlevelcategory()
    {
        return view('admin.endlevelcategory');
    }

    public function viewaddendlevelcategory()
    {
        return view('admin.addendlevelcategory');
    }

    public function vieweditendlevelcategory()
    {
        return view('admin.editendlevelcategory');
    }
}
