<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use DB;

class CategoryController extends Controller
{
/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::all();

        return view('category.index', ['category' => $category]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }

    public function showPudding($category_name) {
        $data = Category::where('nama', $category_name)->first();
        $result = $data->products;
        $getTotalData = Product::count();

        return view('reportProduct', compact('category_name', 'result', 'getTotalData'));
    }

    public function laporanKategori() {
        $categories = Category::all();
        
        foreach ($categories as $key=>$value) {
            if (count($value->products) > 0) {
                $harga = Product::select(DB::raw("MIN(harga_jual) AS harga_minimum, AVG(harga_jual) AS harga_rata_rata"))->groupBy('category_id')->where('category_id', $value->id)->get();

                $categories[$key]->harga_minimum = $harga[0]->harga_minimum;
                $categories[$key]->harga_rata_rata = $harga[0]->harga_rata_rata;
            } else {
                $categories[$key]->harga_minimum = 0;
                $categories[$key]->harga_rata_rata = 0;
            }
        }

        return view('kategoriProduct', compact('categories'));
    }
}
