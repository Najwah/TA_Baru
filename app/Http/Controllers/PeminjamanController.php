<?php

namespace App\Http\Controllers;

use App\Barang;
use App\Inventaris;
use App\Peminjaman;
use Illuminate\Http\Request;
use DB;
use App\Mahasiswa;
use App\User;
use DataTables;
use App\Keranjang;


class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peminjaman = Peminjaman::orderby('created_at', 'DESC')->get();
        return view('peminjaman.index', ['peminjaman' => $peminjaman]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mahasiswa = Mahasiswa::all();
        $user = User::all();
        $barang=Barang::join('inventaris','inventaris.barang_id','barangs.id')->
      orderBy('barangs.updated_at','DESC')->get();
        // dd($barang);
        $no=0;
        return view('peminjaman.tambah', [
            "mahasiswa" => $mahasiswa,
            "user" => $user,
            "barang" => $barang,
            "no" =>$no
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $peminjam = $request->user();
        $peminjaman = Peminjaman::create($request->except(['mahasiswa_id', 'petugas_id']));
        $peminjaman->peminjam_id = $peminjam->id;
        $peminjaman->save();
        return redirect()->route('peminjaman.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function show(Peminjaman $peminjaman)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function edit(Peminjaman $peminjaman)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Peminjaman $peminjaman)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function destroy(Peminjaman $peminjaman)
    {
        //
    }

    public function tambahBrg($id)
    {

    }

    public function dataKeranjang()
    {
        // $data = Keranjang::with(['barang'])->select(['id_k','ket','jumlah','no_inventaris','nama']);

        // $data = DB::table('peminjaman_keranjang')
        //          ->join('barangs', 'barangs.id', '=', 'peminjaman_keranjang.id_barang')
        //          ->get();

        $data = Keranjang::join('barangs', 'barangs.id', '=', 'peminjaman_keranjang.id_barang')
                 ->select(['id_k','ket','jumlah','no_inventaris','barangs.nama']);

        return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action',function($row){
                    $btn = " <button id='hapusBtn' data-id='$row->id_k' class='btn btn-sm btn-danger'>Hapus</button>";
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);


    }

    public function tambahKeranjang($id)
    {
        $data = Inventaris::where('id',$id)->first();

        $cek = Keranjang::where('no_inventaris',$data->nomor_inventaris)->count();

        if($cek==0)
        {
            Keranjang::create([
                "id_barang"=>$data->barang_id,
                "no_inventaris"=>$data->nomor_inventaris,
                "jumlah"=>1,
                "ket"=>"-"
            ]);
        }


        return "success";
    }

    public function hapusBarang($id)
    {
        $data = Keranjang::find($id)->delete();
        return "success";
    }
}
