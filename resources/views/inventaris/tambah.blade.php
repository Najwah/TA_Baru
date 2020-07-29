@extends('master')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
<h1> Tambah inventaris </h1>
<form class="mt-5" action="{{route('inventaris.createDua')}}" method='get'>
    @csrf
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Barang</label>
      <div class="col-sm-10">
        <select name="barang" class="form-control">
            @foreach ($barang as $barang)
        <option value="{{$barang->id}}">{{$barang->nama}} | {{$barang->merk}} {{$barang->tipe}}</option>
            @endforeach
        </select>
      </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Sumber Dana</label>
        <div class="col-sm-10">
          <select name="sumber_dana" class="form-control">
              @foreach ($sumberDana as $sumberDana)
                  <option value="{{$sumberDana->id}}">{{$sumberDana->nama}}</option>
              @endforeach
          </select>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Tahun Perolehan</label>
        <div class="col-sm-10">
          <input type="number" min="1900" max="2099" name="tahun_perolehan" />
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Tempat</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="tempat"/>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Kondisi Barang</label>
        <div class="col-sm-10">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="kondisi" id="exampleRadios1" value="BL" checked>
                <label class="form-check-label" for="exampleRadios1">
                  Baik dan Lengkap (BL)
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="kondisi" id="exampleRadios1" value="BT" checked>
                <label class="form-check-label" for="exampleRadios1">
                  Baik Tidak Lengkap (BT)
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="kondisi" id="exampleRadios1" value="RR" checked>
                <label class="form-check-label" for="exampleRadios1">
                  Rusak Ringan (RR)
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="kondisi" id="exampleRadios1" value="RB" checked>
                <label class="form-check-label" for="exampleRadios1">
                  Rusak Berat (BB)
                </label>
              </div>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Jenis Barang</label>
        <div class="col-sm-10">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="habis_pakai" id="exampleRadios1" value="1" checked>
                <label class="form-check-label" for="exampleRadios1">
                  Habis Pakai
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="habis_pakai" id="exampleRadios1" value="0" checked>
                <label class="form-check-label" for="exampleRadios1">
                 Modal
                </label>
              </div>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Peruntukan</label>
        <div class="col-sm-10">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="peruntukan" id="exampleRadios1" value="lab" checked>
                <label class="form-check-label" for="exampleRadios1">
                  Laboratorium
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="peruntukan" id="exampleRadios1" value="dosen" checked>
                <label class="form-check-label" for="exampleRadios1">
                  Dosen
                </label>
              </div>
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Next</button>
</form>
    </div>
  </div>
</div>
@endsection
