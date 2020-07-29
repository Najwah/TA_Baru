@extends('master')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
<h1> Tambah inventaris lab</h1>
<form class="mt-5" action="{{route('inventaris.store')}}" method='post'>
    @csrf
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Barang</label>
      <div class="col-sm-10">
        <select name="barang" class="form-control" >
            @foreach ($barang as $barang)
                @if ($barang->id == $data["barang"])
                    <option value="{{$barang->id}}" selected>{{$barang->nama}}</option>
                @else
                    <option value="{{$barang->id}}">{{$barang->nama}}</option>
                @endif
            @endforeach
        </select>
      </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Sumber Dana</label>
        <div class="col-sm-10">
          <select name="sumber_dana" class="form-control" >
              @foreach ($sumberDana as $sumberDana)
                @if ($sumberDana->id == $data["sumber_dana"])
                    <option value="{{$sumberDana->id}}" selected>{{$sumberDana->nama}}</option>
                @else
                    <option value="{{$sumberDana->id}}">{{$sumberDana->nama}}</option>
                @endif
              @endforeach
          </select>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Tahun Perolehan</label>
        <div class="col-sm-10">
        <input type="number" min="1900" max="2099" name="tahun_perolehan"  value="{{$data["tahun_perolehan"]}}"/>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Tempat</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="tempat"  value="{{$data["tempat"]}}"/>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Kondisi Barang</label>
        <div class="col-sm-10">
            <div class="form-check">
                @if ($data["kondisi"] == "BL")
                    <input class="form-check-input" type="radio" name="kondisi" id="exampleRadios1" value="BL"  checked>
                @else
                    <input class="form-check-input" type="radio" name="kondisi" id="exampleRadios1" value="BL" >
                @endif
                <label class="form-check-label" for="exampleRadios1">
                  Baik dan Lengkap (BL)
                </label>
              </div>
              <div class="form-check">
                @if ($data["kondisi"] == "BT")
                    <input class="form-check-input" type="radio" name="kondisi" id="exampleRadios1" value="BT" checked>
                @else
                    <input class="form-check-input" type="radio" name="kondisi" id="exampleRadios1" value="BT" >
                @endif
                <label class="form-check-label" for="exampleRadios1">
                  Baik Tidak Lengkap (BT)
                </label>
              </div>
              <div class="form-check">
                @if ($data["kondisi"] == "RR")
                    <input class="form-check-input" type="radio" name="kondisi" id="exampleRadios1" value="RR" checked>
                @else
                    <input class="form-check-input" type="radio" name="kondisi" id="exampleRadios1" value="RR" >
                @endif
                <label class="form-check-label" for="exampleRadios1">
                  Rusak Ringan (RR)
                </label>
              </div>
              <div class="form-check">
                @if ($data["kondisi"] == "RB")
                    <input class="form-check-input" type="radio" name="kondisi" id="exampleRadios1" value="RB" checked>
                @else
                    <input class="form-check-input" type="radio" name="kondisi" id="exampleRadios1" value="RB" >
                @endif
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
                @if ($data["habis_pakai"] == "1")
                    <input class="form-check-input" type="radio" name="habis_pakai" id="exampleRadios1" value="1" checked>
                @else
                    <input class="form-check-input" type="radio" name="habis_pakai" id="exampleRadios1" value="1" >
                @endif
                <label class="form-check-label" for="exampleRadios1">
                  Habis Pakai
                </label>
              </div>
              <div class="form-check">
                @if ($data["habis_pakai"] == "0")
                    <input class="form-check-input" type="radio" name="habis_pakai" id="exampleRadios1" value="0" checked>
                @else
                    <input class="form-check-input" type="radio" name="habis_pakai" id="exampleRadios1" value="0" >
                @endif
                <label class="form-check-label" for="exampleRadios1">
                 Modal
                </label>
              </div>
        </div>
      </div>
      <input type="hidden" name="peruntukan" value="{{$peruntukan}}" />
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Lab</label>
        <div class="col-sm-10">
            <select name="lab" class="form-control">
                @foreach ($lab as $lab)
                    <option value="{{$lab->id}}">{{$lab->nama}}</option>
                @endforeach
            </select>
        </div>
      </div>
      <button type="submit" class="btn btn-primary">submit</button>
</form>
    </div>
  </div>
</div>
@endsection
