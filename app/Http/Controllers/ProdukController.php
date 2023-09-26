<?php

namespace App\Http\Controllers;

use App\Models\produk;
use App\Http\Requests\StoreprodukRequest;
use App\Http\Requests\UpdateprodukRequest;
use illuminate\Support\Facades\DB;
use App\Exports\ProdukExport;
use App\Imports\ProdukImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use PDF;



class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['produk'] = produk::orderBy('created_at', 'ASC')->get();
        return view('produk.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreprodukRequest $request)
    {
        Produk::create($request->all());
        return redirect('produk')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(produk $produk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateprodukRequest $request, produk $produk)
    {
        $validated = $request->validated();
        $produk->update($validated);
        return redirect()->route('produk.index')->with('success', 'Update data berhasil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(produk $produk)
    {
        $produk->delete();

        return redirect('produk')->with('success', 'Data Berhasil  dihapus!');
    }

    public function exportData(){
        $filename=date('Ymd').'_produk.xlsx';
        return Excel::download(new ProdukExport, $filename);
            }

            
    public function importData(Request $request){
        $file =$request->import;

        Excel::import(new ProdukImport, $file);
        return redirect()->back()->with('success','data berhasil di import');
    }


    public function downloadspdf(){
        $data['produk']=Produk::get();
        $pdf= Pdf::loadView('produk/data',$data);
        return $pdf->stream();
    }



}
