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
        // $query_builder = DB::table('products')->get();
        $query_builder = Product::all();
        $categories = Category::all();
        $suppliers = Supplier::all();

        // Query Model
        // $query_model = Product::all();

        return view('product.index', ['products' => $query_builder, 'categories' => $categories, 'suppliers' => $suppliers]);
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
        $product->nama = $request->get('nama');
        $product->stok = $request->get('stok');
        $product->harga_jual = $request->get('harga_jual');
        $product->harga_produksi = $request->get('harga_produksi');
        $product->category_id = $request->get('kategori');
        $product->supplier_id = $request->get('supplier');
        $product->image = $request->get('image');
        $product->save();

        return redirect()->route('product.index')->with('status', 'Data produk berhasil diubah');
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

    public function getEditForm(Request $request) {
        $id = $request->get('id');
        $data = Product::find($id);
        $categories = Category::all();
        $suppliers = Supplier::all();

        return response()->json(array(
            'status' => 'oke',
            'msg' => view('product.editModal', compact('data', 'categories', 'suppliers'))->render()
        ), 200);
    }

    public function getEditForm2(Request $request) {
        $id = $request->get('id');
        $data = Product::find($id);
        $categories = Category::all();
        $suppliers = Supplier::all();

        return response()->json(array(
            'status' => 'oke',
            'msg' => view('product.editModal2', compact('data', 'categories', 'suppliers'))->render()
        ), 200);
    }

    public function saveData(Request $request) {
        $id = $request->get('id');
        $product = Product::find($id);
        $product->nama = $request->get('nama');
        $product->stok = $request->get('stok');
        $product->harga_jual = $request->get('harga_jual');
        $product->harga_produksi = $request->get('harga_produksi');
        $product->category_id = $request->get('category_id');
        $product->supplier_id = $request->get('supplier_id');
        $product->image = $request->get('image');
        $product->save();

        return response()->json(array(
            'status' => 'ok',
            'msg' => 'Product Data Updated'
        ), 200);
    }

    public function deleteData(Request $request) {
        try {
            $id = $request->get('id');
            $product = Product::find($id);
            $product->delete();

            return response()->json(array(
                'status' => 'ok',
                'msg' => 'product data deleted'
            ), 200);
        } catch(\PDOException $e) {
            return response()->json(array(
                'status' => 'error',
                'msg' => 'product is not deleted. It may be used in the transaction'
            ), 200);
        }
    }

    public function front_index() {
        $products = Product::all();
        return view('frontend.product', compact('products'));
    }

    public function addToCart($id) {
        $p = Product::find($id);
        $cart = session()->get('cart');

        if (!isset($cart[$id])) {
            $cart[$id] = [
                "nama" => $p->nama,
                "quantity" => 1,
                "price" => $p->harga_jual,
                "photo" => $p->image
            ];
        } else {
            $cart[$id]['quantity']++;
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function cart() {
        return view('frontend.cart');
    }

    public function form_submit_front() {
        $this->authorize('checkmember');
        return view('frontend.checkout');
    }

    public function submit_front() {
        $this->authorize('checkmember');
    }
}
