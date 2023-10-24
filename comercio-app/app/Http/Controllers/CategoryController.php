<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Toplevelcategory;
use App\Models\Middlelevelcategory;

class CategoryController extends Controller
{
    public function viewtoplevelcategory()
    {
        $toplevelcategories = Toplevelcategory::get();

        $increment = 1;

        return view('admin.toplevelcategory')->with('toplevelcategories', $toplevelcategories)->with("increment", $increment);
    }

    public function viewaddtoplevelcategory()
    {
        return view('admin.addtoplevelcategory');
    }

    public function viewedittoplevelcategory($id)
    {
        $toplevelcategory = Toplevelcategory::find($id);

        return view('admin.edittoplevelcategory')->with('toplevelcategory', $toplevelcategory);
    }

    public function viewmidlevelcategory()
    {
        $midlevelcategories = Middlelevelcategory::get();

        $increment = 1;

        return view('admin.midlevelcategory')->with('midlevelcategories', $midlevelcategories)->with("increment", $increment);
    }

    public function viewaddmidlevelcategory()
    {
        $toplevelcategories = Toplevelcategory::get();

        $increment = 1;

        return view('admin.addmidlevelcategory')->with('toplevelcategories', $toplevelcategories)->with("increment", $increment);
    }

    public function savemiddlecategory(Request $request)
    {
        $middlecategory = new Middlelevelcategory();

        $middlecategory->tcat_id = $request->input('tcat_id');

        $middlecategory->mcat_name = $request->input('mcat_name');

        $middlecategory->save();

        return back()->with("status", "The middle level category has been savedd!");
    }

    public function vieweditmiddlecategory($id)
    {

        $middlelevelcategory = Middlelevelcategory::find($id);
        $toplevelcategories = Toplevelcategory::where('tcat_name', '!=', $middlelevelcategory->tcat_id)->get();
        // $middlelevelcategory->tcat_id = $request->input('tcat_id');

        // $middlelevelcategory->mcat_name = $request->input('mcat_name');

        // $middlecategory->update();

        // dd($middlelevelcategory);
        return view('admin.editmidlevelcategory')->with('middlelevelcategory', $middlelevelcategory)->with('toplevelcategories', $toplevelcategories);
    }

    public function updatemidcategory(Request $request, $id)
    {
        $middlecategory = Middlelevelcategory::find($id);

        $middlecategory->tcat_id = $request->input('tcat_id');

        $middlecategory->mcat_name = $request->input('mcat_name');

        $middlecategory->update();

        return back()->with("status", "The middle level category has been updated!");
    }

    public function deletemidlevelcategory($id)
    {
        $midlevelcategory = Middlelevelcategory::find($id);
        $midlevelcategory->delete($id);

        return back()->with("status", "The mid level category has been deleted!");
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

    public function savetoplevelcat(Request $request)
    {
        $this->validate($request, [
            'tcat_name' => 'required',
            'show_on_menu' => 'required'
        ]);

        $toplevelcat = new Toplevelcategory();
        $toplevelcat->tcat_name = $request->input('tcat_name');
        $toplevelcat->show_on_menu = $request->input('show_on_menu');

        $toplevelcat->save();

        return back()->with("status", "The top level category has been saved!");
    }

    public function updatetoplevelcategory(Request $request, $id)
    {
        $this->validate($request, [
            'tcat_name' => 'required',
            'show_on_menu' => 'required'
        ]);

        $toplevelcategory = Toplevelcategory::find($id);
        $toplevelcategory->tcat_name = $request->input('tcat_name');
        $toplevelcategory->show_on_menu = $request->input('show_on_menu');

        $toplevelcategory->update();

        return back()->with("status", "The top level category has been updated!");
    }

    public function deletetoplevelcategory($id)
    {
        $toplevelcategory = Toplevelcategory::find($id);
        $toplevelcategory->delete($id);

        return back()->with("status", "The top level category has been deleted!");
    }
}
