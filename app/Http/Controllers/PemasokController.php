<?php

namespace App\Http\Controllers;

use App\Models\pemasok;
use App\Http\Requests\StorepemasokRequest;
use App\Http\Requests\UpdatepemasokRequest;
use PDF;

class PemasokController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['pemasok'] = pemasok::orderBy('created_at', 'ASC')->get();
        return view('pemasok.index')->with($data);
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
    public function store(StorepemasokRequest $request)
    {
        Pemasok::create($request->all());
        return redirect('pemasok')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(pemasok $pemasok)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(pemasok $pemasok)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatepemasokRequest $request, pemasok $pemasok)
    {
        $validated = $request->validated();
        $pemasok->update($validated);
        return redirect()->route('pemasok.index')->with('success', 'Update data berhasil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(pemasok $pemasok)
    {
        $pemasok->delete();

        return redirect('pemasok')->with('success', 'Data Berhasil  dihapus!');
    }

    
    public function downloadpdf(){
    $data['pemasok']=Pemasok::get();
    $pdf= Pdf::loadView('pemasok/data',$data);
    return $pdf->stream();
    }

}
