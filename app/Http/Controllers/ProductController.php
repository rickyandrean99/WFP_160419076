<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Supplier;
use DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Query Raw
        // $query_raw = DB::select(DB::raw('SELECT * FROM products'));

        // Query Builder
        $query_builder = DB::table('products')->get();

        // Query Model
        // $query_model = Product::all();

        return view('product.index', ['products' => $query_builder]);
        // return view('product.index', compact('query_builder'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $suppliers = Supplier::all();

        return view('product.create', compact(['categories', 'suppliers']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Product();
        $data->nama = $request->get('nama');
        $data->stok = $request->get('stok');
        $data->harga_jual = $request->get('harga_jual');
        $data->harga_produksi = $request->get('harga_produksi');
        $data->category_id = $request->get('kategori');
        $data->supplier_id = $request->get('supplier');
        $data->image = $request->get('image');
        $data->save();

        return redirect()->route("product.index")->with("status", "Data Product Berhasil Ditambah!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $data = $product;
        return view('product.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
