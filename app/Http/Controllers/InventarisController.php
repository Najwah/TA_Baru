<?php

namespace App\Http\Controllers;

use App\Barang;
use App\Dosen;
use App\Inventaris;
use App\Lab;
use App\SumberDana;
use Illuminate\Http\Request;

class InventarisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inventaris = Inventaris::with(['barang','sumberDana','peruntukan'])->get();

        return view('inventaris.index', ['inventaris' => $inventaris]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {


        $sumberDana = SumberDana::all();
        $barang = Barang::all();
        return view('inventaris.tambah', [
            "sumberDana" => $sumberDana,
            "barang" => $barang
        ]);
    }

    public function createDua(Request $request)
    {

        $sumberDana = SumberDana::all();
        $barang = Barang::all();

        if ($request->peruntukan == "lab") {
            $lab = Lab::all();
            return view('inventaris.tambahLab', [
                "data" => $request->except('peruntukan'),
                "lab" => $lab,
                "sumberDana" => $sumberDana,
                "barang" => $barang,
                "peruntukan" => "01"
            ]);
        } else if ($request->peruntukan == "dosen") {
            $dosen = Dosen::all();
            return view('inventaris.tambahDosen', [
                "data" => $request->except('peruntukan'),
                "dosen" => $dosen,
                "sumberDana" => $sumberDana,
                "barang" => $barang,
                "peruntukan" => "02"
            ]);
        }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inventaris = Inventaris::create($request->except(['barang', 'sumber_dana', 'dosen', 'lab']));

        $jumlah = Inventaris::where('barang_id', $request->barang);

        $barang = Barang::find($request->barang);
        if($jumlah->count() > 0){
            $no=$jumlah->count()+1;

            $no_iven = $barang->kode . "-" . $request->tahun_perolehan . "-" . $request->sumber_dana . "-" . $request->peruntukan."-".$no;
            // var_dump($no_iven);exit();
        }else{
            $no_iven = $barang->kode . "-" . $request->tahun_perolehan . "-" . $request->sumber_dana . "-" . $request->peruntukan."-"."1";
        }


        // exit();
        // if ($jumlah < 10) {
        //     $nomor = $barang->kode . "-000" . ($jumlah + 1);
        // } else if ($jumlah < 100) {
        //     $nomor = $barang->kode . "-00" . ($jumlah + 1);
        // } else if ($jumlah < 1000) {
        //     $nomor = $barang->kode . "-0" . ($jumlah + 1);
        // } else {
        //     $nomor = $barang->kode . ($jumlah + 1);
        // }

        // $nomor = $nomor . "-" . $request->tahun_perolehan;

        // $sumberDana = SumberDana::find($request->sumber_dana);

        // $nomor = $nomor . "-" . $sumberDana->kode;

        $inventaris->nomor_inventaris = $no_iven;

        $sumberDana = SumberDana::find($request->sumber_dana);

        $inventaris->barang()->associate($barang);
        $inventaris->sumberDana()->associate($sumberDana);
        if ($request->has('dosen')) {
            $dosen = Dosen::find($request->dosen);
            $inventaris->peruntukan()->associate($dosen);
        } else {
            $lab = Lab::find($request->lab);
            $inventaris->peruntukan()->associate($lab);
        }
        $inventaris->save();
        return redirect()->route('inventaris.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Inventaris  $inventaris
     * @return \Illuminate\Http\Response
     */
    public function show(Inventaris $inventaris)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Inventaris  $inventaris
     * @return \Illuminate\Http\Response
     */
    public function edit(Inventaris $inventaris)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Inventaris  $inventaris
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inventaris $inventaris)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Inventaris  $inventaris
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inventaris $inventaris)
    {
        //
    }
}
