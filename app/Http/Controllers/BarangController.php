<?php

namespace App\Http\Controllers;

use App\Barang;
use App\Inventaris;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = Barang::orderby('created_at', 'DESC')->get();
        return view('barang.index', ['barang' => $barang]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('barang.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'foto' => 'required|file|max:2048',
            'nama' => 'required',
            'merk' => 'required',
            'tipe' => 'required',
            'satuan' => 'required',
            'spesifikasi' => 'required'
        ]);

        $jumlah = Barang::all()->count();

        $barang = Barang::create($request->except('foto'));

        $nama = substr($barang->nama, 0, 2);
        $tipe = substr($barang->tipe, 0, 4);

        $barang->kode = rand(1, 9999999999);

        if ($request->hasFile('foto')) {
            $url = $request->foto->store('public');
            $barang->foto = $url;
        }

        $barang->save();

        return redirect()->route('barang.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $barang = Inventaris::where('barang_id', $id)->with(['barang','sumberDana','peruntukan'])->get();
        // dd($barang);
        return view('barang.lihat', ['barangs' => $barang]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit(Barang $barang)
    {
        return view('barang.edit', ['barang' => $barang]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Barang $barang)
    {
        $barang->update($request->except('foto'));
        if ($request->hasFile('foto')) {
            $url = $request->foto->store('public');
            $barang->foto = $url;
            $barang->save();
        }
        return redirect()->route('barang.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barang $barang)
    {
        Storage::delete($barang->foto);
        $barang->delete();
        return redirect()->route('barang.index');
    }
}
