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

Route::get('/', function () {
    return view('welcome');
});

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
Route::resource('supplier', 'SupplierController');
Route::resource('category', 'CategoryController');
Route::resource('transaction', 'TransactionController');

Route::get('/report/showpudding/{name}', 'CategoryController@showPudding')->name('reportShowPudding');
Route::get('/laporan/kategoriproduk', 'CategoryController@laporanKategori')->name('laporanKategoriProduk');
Route::get('/report/reratajumlahstok', 'SupplierController@reportStok')->name('reportJumlahStok');
Route::post('supplier/showInfo/', 'SupplierController@showInfo')->name('suppliers.showinfo');
Route::post('supplier/showDataAjax/', 'SupplierController@showAjax')->name('suppliers.showAjax');
Route::post('transaction/showDataAjax/', 'TransactionController@showAjax')->name('transaction.showAjax');