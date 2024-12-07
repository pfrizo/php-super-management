<?php

use App\Http\Controllers\ProductController;
use App\Http\Middleware\AccessLogMiddleware;
use Illuminate\Support\Facades\Route;

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

/*Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', 'MainController@main')->name('website.index');
Route::get('/about-us', 'AboutUsController@aboutUs')->name('website.aboutUs');

Route::get('/contact', 'ContactController@contact')->name('website.contact');
Route::post('/contact', 'ContactController@save')->name('website.contact');

Route::get('/login/{error?}', 'LoginController@index')->name('website.login');
Route::post('/login', 'LoginController@authenticate')->name('website.login');

//'contact/{name?}/{category?}/{subject?}/{message?}'   ? = not required
/*Route::get(
    'contact/{name}/{category_id}',
    function (
        string $name = 'unknown',
        int $category_id = 1
    ) {
        echo "We're here: $name - $category_id";
    }
)->where('category_id', '[0-9]+')->where('name', '[A-Za-z]+'); //Parameters treatment
*/

Route::middleware('authentication')->prefix('/app')->group(function(){
    Route::get('/home', 'HomeController@index')->name('app.home');
    Route::get('/logout', 'LoginController@logout')->name('app.logout');

    Route::get('/supplier', 'SupplierController@index')->name('app.supplier');
    Route::get('/supplier/list', 'SupplierController@list')->name('app.supplier.list');
    Route::post('/supplier/list', 'SupplierController@list')->name('app.supplier.list');
    Route::get('/supplier/add', 'SupplierController@add')->name('app.supplier.add');
    Route::post('/supplier/add', 'SupplierController@add')->name('app.supplier.add');
    Route::get('/supplier/edit/{id}/{msg?}', 'SupplierController@edit')->name('app.supplier.edit');
    Route::get('/supplier/delete/{id}', 'SupplierController@delete')->name('app.supplier.delete');

    Route::resource('product', 'ProductController');
    Route::resource('product-detail', 'ProductDetailController');

    Route::resource('client', 'ClientController');
    Route::resource('order', 'OrderController');
    //Route::resource('order-product', 'OrderProductController');
    Route::get('/order-product/create/{order}', 'OrderProductController@create')->name('order-product.create');
    Route::post('/order-product/store/{order}', 'OrderProductController@store')->name('order-product.store');
    //Route::delete('/order-product/destroy/{order}/{product}', 'OrderProductController@destroy')->name('order-product.destroy');
    Route::delete('/order-product/destroy/{orderProduct}', 'OrderProductController@destroy')->name('order-product.destroy');
});

Route::get('/route1', function(){
    echo 'Route 1';
})->name('website.route1');

Route::get('/route2', function(){
    return redirect()->route('website.route1');
})->name('website.route2');

//Route::redirect('/route2', '/route1');

Route::get('/test/{p1}/{p2}', 'TestController@test')->name('test');

Route::fallback(function() {
    echo 'The accessed route does not exist. <a href="'.route('website.index').'">Click here</a> to go to the home page';
});
