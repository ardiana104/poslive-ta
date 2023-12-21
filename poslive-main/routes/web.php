<?php

use App\Http\Livewire\Cart;
use App\Http\Livewire\Posts;
use App\Http\Livewire\Kontak;
use App\Http\Livewire\Product;
use App\Http\Livewire\Profile;
use App\Http\Livewire\Reports;
use App\Http\Livewire\Atributs;
use App\Http\Livewire\Category;
use App\Http\Livewire\Takeaway;
use App\Http\Livewire\AdminHome;
use App\Http\Livewire\CustomerHome;
use App\Http\Livewire\Ordermethods;
use App\Http\Livewire\Frontend\Blog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Frontend\Coffee;
use App\Http\Livewire\Frontend\Produk;
use App\Http\Livewire\Frontend\ShowBlog;
use App\Http\Livewire\Frontend\ShowProduk;
use App\Http\Livewire\Frontend\TentangKami;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('coffee', Coffee::class)->name('coffee');

Route::get('produk', Produk::class)->name('produk');
Route::get('produk/{slug}', ShowProduk::class)->name('showproduk');

Route::get('tentangkami', TentangKami::class)->name('tentangkami');
Route::get('kontak', Kontak::class)->name('kontak');

Route::get('blog', Blog::class)->name('blog');
Route::get('blog/{slug}', ShowBlog::class)->name('showblog');

Auth::routes(['verify' => true]);

// Route::group(['middleware' => ['auth', 'verified']], function () {
//     Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//     Route::prefix('categories')->group(function(){
//         Route::get('/categories', Category::class)->name('categories');
//         Route::post('store', Category::class)->name('categories.store');
//         Route::post('delete', Category::class)->name('categories.delete');
//         Route::post('update', Category::class)->name('categories.update');
//     });
    
//     Route::prefix('products')->group(function(){
//         Route::get('/products', Product::class)->name('products');
//         Route::post('store', Product::class)->name('products.store');
//         Route::post('update', Product::class)->name('products.update');
//         Route::post('delete', Product::class)->name('products.delete');
//         Route::post('updateProductImage', Product::class)->name('products.updateProductImage');
//     });

//     Route::get('/cart', Cart::class)->name('cart');
//     Route::get('/takeaway', Takeaway::class)->name('takeaway');

//     Route::prefix('profile')->group(function(){
//         Route::get('/profile', Profile::class)->name('profile');
//         Route::post('address', Profile::class)->name('profile.address');
//         Route::post('updateAvatar', Profile::class)->name('profile.updateAvatar');
//         Route::post('updateAddress', Profile::class)->name('profile.updateAddress');
//         Route::post('deleteAddress', Profile::class)->name('profile.deleteAddress');
//     });

//     Route::get('/customer-home', CustomerHome::class)->name('customer-home');
//     Route::get('/admin-home', AdminHome::class)->name('admin-home');

//     Route::prefix('options')->group(function(){
//         Route::get('/options', Options::class)->name('options');
//         Route::post('store', Options::class)->name('options.store');
//         Route::post('update', Options::class)->name('options.update');
//         Route::post('delete', Options::class)->name('options.delete');
//     });

//     Route::prefix('ordermethods')->group(function(){
//         Route::get('/ordermethods', Ordermethods::class)->name('ordermethods');
//         Route::post('store', Ordermethods::class)->name('ordermethods.store');
//         Route::post('update', Ordermethods::class)->name('ordermethods.update');
//         Route::post('delete', Ordermethods::class)->name('ordermethods.delete');
//     });

//     Route::get('/reports', Reports::class)->name('reports');
// });

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/categories', Category::class)->name('categories');
    Route::get('/products', Product::class)->name('products');
    Route::get('/cart', Cart::class)->name('cart');
    Route::get('/takeaway', Takeaway::class)->name('takeaway');
    Route::get('/profile', Profile::class)->name('profile');
    Route::get('/customer-home', CustomerHome::class)->name('customer-home');
    Route::get('/admin-home', AdminHome::class)->name('admin-home');
    Route::get('/atributs', Atributs::class)->name('atributs');
    Route::get('/ordermethods', Ordermethods::class)->name('ordermethods');
    Route::get('/reports', Reports::class)->name('reports');
    Route::get('/post', Posts::class)->name('post');
});