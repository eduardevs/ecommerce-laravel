<?php

namespace App\Http\Controllers;

use App\Models\Product;

use Illuminate\Http\Request;
use App\Models\Toplevelcategory;

use App\Models\Middlelevelcategory;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function viewproductspage()
    {
        $products = Product::all();
        $increment = 1;

        return view("admin.products")->with("products", $products)->with("increment", $increment);


        return view('admin.products')->with('products', $products);
    }
    public function viewaddproduct()
    {
        $toplevelcat = Toplevelcategory::get();
        $midlevelcat = Middlelevelcategory::get();

        return view('admin.addproduct')->with("toplevelcategories", $toplevelcat)->with("midlevelcategories", $midlevelcat);
    }

    public function saveproduct(Request $request)
    {
        $this->validate($request, [
            'tcat_id' => 'required|string',
            'mcat_id' => 'required|string',
            'p_name' => 'required|string',
            'p_old_price' => 'required|integer',
            'p_current_price' => 'required|integer',
            'p_qty' => 'required|integer',
            'size' => 'required|array',
            'size.*' => 'required|string',
            'color' => 'required|array',
            'color.*' => 'required|string',
            'p_featured_photo' => 'image|nullable|max:1999|required',
            'photo' => 'required|array',
            'photo.*' => 'image|nullable|max:1999|required',
            'p_description' => 'required|string',
            'p_short_description' => 'required|string',
            'p_feature' => 'required|string',
            'p_condition' => 'required|string',
            'p_return_policy' => 'required|string',
            'p_is_featured' => 'required|integer',
            'p_is_active' => 'required|integer'
        ]);

        $imagedata = "";
        $sizes = $request->input('size');
        $colors = $request->input('color');
        $sizedata = "";
        $colordata = "";
        $photos = $request->file('photo');

        foreach ($sizes as $size) {
            $sizedata = $sizedata . $size . "*";
        }

        foreach ($colors as $color) {
            $colordata = $colordata . $color . "*";
        }

        foreach ($photos as $photo) {
            $fileNameWithExt = $photo->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            $ext = $photo->getClientOriginalExtension();

            $fileNameToStore = $fileName . '_' . time() . '.' . $ext;

            $imagedata = $imagedata . $fileNameToStore . "*";
            $path = $photo->storeAs('public/productimages', $fileNameToStore);
        }

        $fileNameWithExt = $request->file('p_featured_photo')->getClientOriginalName();

        // print('<h1>' . $fileNameWithExt . '</h1>');
        // 2 : filename
        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

        // print('');
        // 3 : extension
        $ext = $request->file('p_featured_photo')->getClientOriginalExtension();

        $fileNameToStore = $fileName . '_' . time() . '.' . $ext;

        //  5 : upload image
        $path = $request->file('p_featured_photo')->storeAs('public/productimages', $fileNameToStore);

        $product = new Product();
        $product->tcat_id = $request->input("tcat_id");
        $product->mcat_id = $request->input("mcat_id");
        $product->p_name = $request->input("p_name");
        $product->p_old_price = $request->input("p_old_price");
        $product->p_current_price = $request->input("p_current_price");
        $product->p_qty = $request->input("p_qty");
        $product->size = $sizedata;
        $product->color = $colordata;
        $product->p_featured_photo = $fileNameToStore;
        $product->photo = $imagedata;
        $product->p_description =  htmlspecialchars($request->input("p_description"));
        $product->p_short_description = $request->input("p_short_description");
        $product->p_feature = $request->input("p_feature");
        $product->p_condition = $request->input("p_condition");
        $product->p_return_policy = $request->input("p_return_policy");
        $product->p_is_featured = $request->input("p_is_featured");
        $product->p_is_active = $request->input("p_is_active");

        $product->save();

        return back()->with("status", "The product has been successfully saved!");
    }

    public function vieweditproduct()
    {
        return view('admin.editproduct');
    }

    public function deleteproduct($id)
    {
        $product = Product::find($id);
        Storage::delete("public/productimages/$product->p_featured_photo");

        $photos = explode("*", $product->photo);

        foreach ($photos as $photo) {
            Storage::delete("public/productimages/$photo");
        }

        $product->delete();

        return back()->with("status", "The product has been successfully deleted.");
    }

    public function vieworderspage()
    {
        return view('admin.orders');
    }
}
