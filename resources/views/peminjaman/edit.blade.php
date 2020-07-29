@extends('master')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">

    <form action="{{route('barang.update', $barang->id)}}" method='post' enctype="multipart/form-data">
        @csrf
        @method('PUT')
          <div class="form-group">
            <label for="exampleInputEmail1">Nama</label>
            <input name="nama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $barang->nama }}" >
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Merk</label>
            <input name="merk" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $barang->merk }}" >
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Tipe</label>
            <input name="tipe" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $barang->tipe }}" >
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Satuan</label>
            <input name="satuan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $barang->satuan }}" >
          <div class="form-group">
            <label for="exampleInputEmail1">Spesifikasi</label>
            <textarea name="spesifikasi" class="form-control" id="exampleFormControlTextarea1" rows="3">{{ $barang->spesifikasi }}</textarea>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Foto</label>
            <input name="foto" type="file" class="form-control-file" id="exampleFormControlFile1">
          </div>
          <div class="form-group">
          <img src="{{asset($barang->foto)}}" class="col-md-3"/>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
  </div>
</div>
@endsection
