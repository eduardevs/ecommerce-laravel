<?php

// use App\Http\Controllers\ProductController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\ProductController;

use App\Http\Controllers\SettingController;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('');
// });

// CLIENT
// asset function in template to change the / to other route
Route::get('/', [ClientController::class, 'viewhomepage']);

Route::get('/about', [ClientController::class, 'viewaboutpage']);

Route::get('/faq', [ClientController::class, 'viewfaqpage']);

Route::get('/contact', [ClientController::class, 'viewcontactpage']);

Route::get('/login', [ClientController::class, 'viewloginpage']);

Route::get('/signup', [ClientController::class, 'viewregisterpage']);

Route::get('/cart', [ClientController::class, 'viewcartpage']);

Route::get('/checkout', [ClientController::class, 'viewcheckoutpage']);

Route::get('/dashboard', [ClientController::class, 'viewdashboardpage']);

Route::get('/profile', [ClientController::class, 'viewprofilepage']);

Route::get('/billingdetails', [ClientController::class, 'viewbillingpage']);

Route::get('/updatepassword', [ClientController::class, 'viewloginpasswordpage']);

Route::get('/orders', [ClientController::class, 'vieworderspage']);

Route::get('/productbycategory', [ClientController::class, 'viewproductbycategorypage']);

Route::get('/productdetails/{id}', [ClientController::class, 'viewproductdetailspage']);

Route::get('/productdetails/{id}', [ClientController::class, 'viewproductdetailspage']);

Route::post('/addproductcart/{id}', [ClientController::class, 'addproductcart']);

Route::get('/productsearch', [AdminController::class, 'viewsearchproduct']);

// ADMIN 
Route::get('admin', [AdminController::class, 'viewadmindashboard']);

Route::get('admin/settings', [AdminController::class, 'viewadminsettings']);

Route::get('admin/size', [AdminController::class, 'viewadminsize']);

Route::get('admin/addsize', [AdminController::class, 'viewaddsizepage']);

Route::get('admin/editsize', [AdminController::class, 'vieweditsizepage']);

Route::get('admin/color', [AdminController::class, 'viewcolorpage']);

Route::get('admin/addcolor', [AdminController::class, 'viewaddcolorpage']);

Route::get('admin/editcolor', [AdminController::class, 'vieweditcolorpage']);

Route::get('admin/country', [AdminController::class, 'viewcountrypage']);

Route::get('admin/editcountry', [AdminController::class, 'vieweditcountrypage']);

Route::get('admin/addcountry', [AdminController::class, 'viewaddcountrypage']);

Route::get('admin/shippingcost', [AdminController::class, 'viewshippingpage']);

Route::get('admin/editshipping', [AdminController::class, 'vieweditshippingpage']);

Route::get('admin/toplevelcategory', [CategoryController::class, 'viewtoplevelcategory']);

// *

Route::get('admin/addtoplevelcategory', [CategoryController::class, 'viewaddtoplevelcategory']);

Route::get('admin/edittoplevelcategory/{id}', [CategoryController::class, 'viewedittoplevelcategory']);

Route::put('admin/updatetoplevelcategory/{id}', [CategoryController::class, 'updatetoplevelcategory']);

Route::post('admin/savetoplevelcategory', [CategoryController::class, 'savetoplevelcat']);
// deletetoplevelcategory
Route::delete('admin/deletetoplevelcategory/{id}', [CategoryController::class, 'deletetoplevelcategory']);

Route::get('admin/midlevelcategory', [CategoryController::class, 'viewmidlevelcategory']);

Route::get('admin/addmidlevelcategory', [CategoryController::class, 'viewaddmidlevelcategory']);

Route::post('admin/savemiddlecategory', [CategoryController::class, 'savemiddlecategory']);

Route::get('admin/editmiddlelevelcategory/{id}', [CategoryController::class, 'vieweditmiddlecategory']);

Route::put('admin/updatemidcategory/{id}', [CategoryController::class, 'updatemidcategory']);

Route::delete('admin/deletemidlevelcategory/{id}', [CategoryController::class, 'deletemidlevelcategory']);



Route::post('admin/saveproduct', [ProductController::class, 'saveproduct']);

Route::delete('admin/deleteproduct/{id}', [ProductController::class, 'deleteproduct']);
// Route::get('admin/editmidlevelcategory', [CategoryController::class, 'vieweditmidlevelcategory']);

Route::get('admin/endlevelcategory', [CategoryController::class, 'viewendlevelcategory']);

Route::get('admin/addendlevelcategory', [CategoryController::class, 'viewaddendlevelcategory']);

Route::get('admin/editendlevelcategory', [CategoryController::class, 'vieweditendlevelcategory']);

Route::get('admin/products', [ProductController::class, 'viewproductspage']);

Route::get('admin/addproduct', [ProductController::class, 'viewaddproduct']);

Route::get('admin/editproduct', [ProductController::class, 'vieweditproduct']);

Route::get('admin/orders', [ProductController::class, 'vieworderspage']);

Route::get('admin/sliders', [SliderController::class, 'viewsliderspage']);

Route::get('admin/addslider', [SliderController::class, 'viewaddslider']);

Route::get('admin/editslider', [SliderController::class, 'vieweditslider']);

Route::get('admin/services', [SliderController::class, 'viewservicespage']);

Route::get('admin/addservice', [SliderController::class, 'viewaddservicespage']);

Route::get('admin/editservice', [SliderController::class, 'vieweditservicespage']);

Route::get('admin/faq', [AdminController::class, 'viewfaqpage']);

Route::get('admin/addfaq', [AdminController::class, 'viewaddfaq']);

Route::get('admin/editfaq', [AdminController::class, 'vieweditfaq']);

Route::get('admin/customers', [AdminController::class, 'viewcustomerspage']);

Route::get('admin/pagesettings', [AdminController::class, 'viewsettingspage']);

Route::get('admin/socialmedia', [AdminController::class, 'viewsocialmedia']);

Route::get('admin/subscribers', [AdminController::class, 'viewsubscriberspage']);

Route::get('admin/profile', [AdminController::class, 'viewprofilepage']);

// Functions

Route::post('admin/savelogo', [SettingController::class, 'savelogo']);

Route::put('admin/updatelogo/{id}', [SettingController::class, 'updatelogo']);

// ?
// 
















// Route::get('/product', [ProductController::class, 'index'])->name('product.index');

// Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');

// Route::post('/product', [ProductController::class, 'store'])->name('product.store');

// Route::get('/product/{product}/edit', [ProductController::class, 'edit'])->name('product.edit');

// Route::put('/product/{product}/update', [ProductController::class, 'update'])->name('product.update');

// Route::delete('/product/{product}/destroy', [ProductController::class, 'destroy'])->name('product.destroy');
