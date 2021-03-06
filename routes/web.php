<?php

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

// Route::view('/helloworld', function() {
//     return 'Hello World, Pak Dosen';
// });

// Route::view('/selamatdatang', 'welcome');

// Route::get('/user/{name?}', function ($name = 'Browny') {
//     return 'User '.$name;
// });

// Route::get('/showmhs/{nama}', function ($name = 'Ricky') {
//     echo "Hello ".$name." !";
// })->name('showmhs');

// Route::get('/greeting/{nama?}', function ($name = 'Semua') {
//     return view('welcome', ['nama' => $name]);
// })->name('showgreeting');

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/menu', function () {
    $pudding = ['Almond Jelly', 'Bread', 'Cantonese', 'Danish Apple', 'Flummery', 'Gooey Chocolate', 'Lemon', 'Malva', 'Pannacotta', 'Silky', 'Sussex Pond', 'Yorkshire'];
    return view('menu', ['pudding' => $pudding]);
})->name('menu');

Route::get('/menu/pudding/{jenis}', function ($jenis) {
    // Validasi jenis pudding apakah tersedia
    $pudding = ['Almond Jelly', 'Bread', 'Cantonese', 'Danish Apple', 'Flummery', 'Gooey Chocolate', 'Lemon', 'Malva', 'Pannacotta', 'Silky', 'Sussex Pond', 'Yorkshire'];
    $jenis = ucwords(str_replace('-', ' ', $jenis));
    if (!in_array($jenis, $pudding))
        return redirect()->route('not-found');

    $index = array_search($jenis, $pudding);
    
    $deskripsi = [
        'Ini adalah Almond Jelly Pudding',
        'Ini adalah Bread Pudding',
        'Ini adalah Cantonese Pudding',
        'Ini adalah Danish Apple Pudding',
        'Ini adalah Flummery Pudding',
        'Ini adalah Gooey Chocolate Pudding',
        'Ini adalah Lemon Pudding',
        'Ini adalah Malva Pudding',
        'Ini adalah Pannacotta Pudding',
        'Ini adalah Silky Pudding',
        'Ini adalah Sussex Pond Pudding',
        'Ini adalah Yorkshire Pudding'
    ];

    return view('detil', ['jenis' => $jenis, 'deskripsi' => $deskripsi[$index]]);
});

// Additional routes
Route::get('/menu/pudding/', function () { 
    return redirect()->route('menu');
});

Route::get('/not-found', function() { 
    return view('notfound');
})->name('not-found');

Route::resource('product', 'ProductController');
Route::resource('supplier', 'SupplierController')->middleware('auth');
Route::resource('category', 'CategoryController');
Route::resource('transaction', 'TransactionController');

Route::get('/report/showpudding/{name}', 'CategoryController@showPudding')->name('reportShowPudding');
Route::get('/laporan/kategoriproduk', 'CategoryController@laporanKategori')->name('laporanKategoriProduk');
Route::get('/report/reratajumlahstok', 'SupplierController@reportStok')->name('reportJumlahStok');
Route::post('supplier/showInfo/', 'SupplierController@showInfo')->name('suppliers.showinfo')->middleware('auth');
Route::post('supplier/showDataAjax/', 'SupplierController@showAjax')->name('suppliers.showAjax')->middleware('auth');
Route::post('transaction/showDataAjax/', 'TransactionController@showAjax')->name('transaction.showAjax');

Route::post('/supplier/getEditForm', 'SupplierController@getEditForm')->name('supplier.getEditForm')->middleware('auth');
Route::post('/supplier/getEditForm2', 'SupplierController@getEditForm2')->name('supplier.getEditForm2')->middleware('auth');
Route::post('/supplier/saveData', 'SupplierController@saveData')->name('supplier.saveData')->middleware('auth');
Route::post('/supplier/deleteData', 'SupplierController@deleteData')->name('supplier.deleteData')->middleware('auth');

Route::post('/product/getEditForm', 'ProductController@getEditForm')->name('product.getEditForm');
Route::post('/product/getEditForm2', 'ProductController@getEditForm2')->name('product.getEditForm2');
Route::post('/product/saveData', 'ProductController@saveData')->name('product.saveData');
Route::post('/product/deleteData', 'ProductController@deleteData')->name('product.deleteData');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/','ProductController@front_index');
Route::get('/cart','ProductController@cart');
Route::get('/add-to-cart/{id}','ProductController@addToCart');

Route::get('/checkout',"TransactionController@form_submit_front")->middleware(['auth']);
Route::get('/submit_checkout',"TransactionController@submit_front")->name('submitcheckout')->middleware(['auth']);

Route::post("/supplier/savedatafield", "SupplierController@saveDataField")->name("supplier.saveDataField");