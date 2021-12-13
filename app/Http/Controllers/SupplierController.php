<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supplier;
use DB;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supplier = Supplier::all();

        return view('supplier.index', ['supplier' => $supplier]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("supplier.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Supplier();
        $data->name = $request->get("nama");
        $data->address = $request->get("alamat");
        $data->save();

        return redirect()->route("supplier.index")->with("status", "Data Supplier Berhasil Ditambah!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit(Supplier $supplier)
    {
        return view('supplier.edit', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supplier $supplier)
    {
        $supplier->name = $request->get('nama');
        $supplier->address = $request->get('alamat');
        $supplier->save();

        return redirect()->route('supplier.index')->with('status', 'Data supplier berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier)
    {
        try {
            $supplier->delete();
            return redirect()->route('supplier.index')->with('status', 'Data supplier berhasil dihapus');
        } catch(\PDOException $e) {
            $msg = "Supplier gagal dihapus. Pastikan data child sudah hilang atau tidak berhubungan dengan supplier ini";
            return redirect()->route('supplier.index')->with('error', $msg);
        }
    }

    public function showInfo(Request $request) {
        return response()->json(array(
            'message' => 'Ini adalah informasi terkait Data Supplier',
            'status' => 'OK'
        ), 200);
    }

    public function showAjax(Request $request) {
        $data = $request->get('id');
        $data = Supplier::find($data);

        $dataProduk = $data->products;
        
        return response()->json(array(
            'message'=> view('supplier.showmodal', compact('data', 'dataProduk'))->render()
        ), 200);
    }

    public function getEditForm(Request $request) {
        $id = $request->get('id');
        $data = Supplier::find($id);

        return response()->json(array(
            'status' => 'oke',
            'msg' => view('supplier.editModal', compact('data'))->render()
        ), 200);
    }

    public function getEditForm2(Request $request) {
        $id = $request->get('id');
        $data = Supplier::find($id);

        return response()->json(array(
            'status' => 'oke',
            'msg' => view('supplier.editModal2', compact('data'))->render()
        ), 200);
    }

    public function saveData(Request $request) {
        $id = $request->get('id');
        $supplier = Supplier::find($id);
        $supplier->name = $request->get('name');
        $supplier->address = $request->get('address');
        $supplier->save();

        return response()->json(array(
            'status' => 'ok',
            'msg' => 'Supplier Data Updated'
        ), 200);
    }

    public function deleteData(Request $request) {
        try {
            $id = $request->get('id');
            $supplier = Supplier::find($id);
            $supplier->delete();

            return response()->json(array(
                'status' => 'ok',
                'msg' => 'supplier data deleted'
            ), 200);
        } catch(\PDOException $e) {
            return response()->json(array(
                'status' => 'error',
                'msg' => 'supplier is not deleted. It may be used in the product'
            ), 200);
        }
    }

    public function saveDataField(Request $request) {
        $id = $request->get("id");
        $fname = $request->get("fname");
        $value = $request->get("value");

        $supplier = Supplier::find($id);
        $supplier->$fname = $value;
        $supplier->save();

        return response()->json(array(
            "status" => "ok",
            "msg" => "Supplier Data Updated"
        ), 200);
    }
}
