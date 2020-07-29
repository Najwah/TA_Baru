<?php

namespace App\Http\Controllers;

use App\Peruntukan;
use App\Dosen;
use App\Lab;
use Illuminate\Http\Request;

class PeruntukanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peruntukan=Peruntukan::all();
        return view('peruntukan.index',['peruntukan'=>$peruntukan]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dosen = Dosen::all();
        $lab = Lab::all();
        return view('peruntukan.tambah',[
            "dosen"=>$dosen,
            "lab"=>$lab
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
        $peruntukan=Peruntukan::create($request->all());
        if ($request->has('dosen')){
            $dosen=Dosen::find($request->dosen);
            $peruntukan->dosen()->associate($dosen);
        }else if ($request->has('lab')){
            $lab=Lab::find($request->lab);
            $peruntukan->lab()->associate($lab);
        }
        return redirect()->route('peruntukan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Peruntukan  $peruntukan
     * @return \Illuminate\Http\Response
     */
    public function show(Peruntukan $peruntukan)
    {
        return view('peruntukan.lihat',['peruntukan'=>$peruntukan]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Peruntukan  $peruntukan
     * @return \Illuminate\Http\Response
     */
    public function edit(Peruntukan $peruntukan)
    {
        return view('peruntukan.edit',['peruntukan'=>$peruntukan]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Peruntukan  $peruntukan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Peruntukan $peruntukan)
    {
        $peruntukan->update($request->all());
        return redirect()->route('peruntukan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Peruntukan  $peruntukan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Peruntukan $peruntukan)
    {
        $peruntukan->delete();
        return redirect()->route('peruntukan.index');
    }
}
