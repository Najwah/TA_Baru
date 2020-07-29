<?php

namespace App\Http\Controllers;

use App\SumberDana;
use Illuminate\Http\Request;

class SumberDanaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sumberDana=SumberDana::all();
        return view('sumberDana.index',['sumberDana'=>$sumberDana]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sumberDana.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sumberDana=SumberDana::create($request->all());
        return redirect()->route('sumberDana.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SumberDana  $sumberDana
     * @return \Illuminate\Http\Response
     */
    public function show(SumberDana $sumberDana)
    {
        return view('sumberDana.lihat',['sumberDana'=>$sumberDana]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SumberDana  $sumberDana
     * @return \Illuminate\Http\Response
     */
    public function edit(SumberDana $sumberDana)
    {
        return view('sumberDana.edit',['sumberDana'=>$sumberDana]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SumberDana  $sumberDana
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SumberDana $sumberDana)
    {
        $sumberDana->update($request->all());
        return redirect()->route('sumberDana.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SumberDana  $sumberDana
     * @return \Illuminate\Http\Response
     */
    public function destroy(SumberDana $sumberDana)
    {
        $sumberDana->delete();
        return redirect()->route('sumberDana.index');
    }
}
