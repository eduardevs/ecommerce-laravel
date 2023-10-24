<?php

namespace App\Http\Controllers;

use App\Models\Logoimage;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    // 
    public function savelogo(Request $request)
    {
        // 1 : filename with extension
        $this->validate($request, [
            'photo_logo' => 'image|nullable|max:1999|required'
        ]);

        $fileNameWithExt = $request->file('photo_logo')->getClientOriginalName();

        // print('<h1>' . $fileNameWithExt . '</h1>');
        // 2 : filename
        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

        // print('');
        // 3 : extension
        $ext = $request->file('photo_logo')->getClientOriginalExtension();

        $fileNameToStore = $fileName . '_' . time() . '.' . $ext;

        //  5 : upload image
        $path = $request->file('photo_logo')->storeAs('public/logoimage', $fileNameToStore);

        $logoimage = new Logoimage();
        $logoimage->photo_logo = $fileNameToStore;
        $logoimage->save();

        return back()->with("status", "The logo image was succesfully saved !");
    }

    public function updatelogo(Request $request, $id)
    {
        // 1 : filename with extension
        $this->validate($request, [
            'photo_logo' => 'image|nullable|max:1999|required'
        ]);

        $fileNameWithExt = $request->file('photo_logo')->getClientOriginalName();

        // print('<h1>' . $fileNameWithExt . '</h1>');
        // 2 : filename
        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

        // print('');
        // 3 : extension
        $ext = $request->file('photo_logo')->getClientOriginalExtension();

        $fileNameToStore = $fileName . '_' . time() . '.' . $ext;

        $logoimage = Logoimage::find($id);

        Storage::delete("public/logoimage/$logoimage->photo_logo");

        //  5 : upload image
        $path = $request->file('photo_logo')->storeAs('public/logoimage', $fileNameToStore);

        $logoimage->photo_logo = $fileNameToStore;

        $logoimage->update();

        return back()->with("status", "The logo image was succesfully updated !");
    }
}
