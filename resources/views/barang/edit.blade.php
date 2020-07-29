@extends('master')

@section('content')
<div class="container-fluid">
<div class="row">
    <div class="col-md-12">
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
    <div class="col-sm-12">
      <form class="mt-12" action="{{route('barang.update', $barang->id)}}" method='post' enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group row">
          <label for="inputPassword" class="col-sm-3 col-form-label">Nama</label>
          <div class="col-sm-9">
            <input name="nama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $barang->nama }}">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputPassword" class="col-sm-3 col-form-label">Merk</label>
          <div class="col-sm-9">
            <input name="merk" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $barang->merk }}">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputPassword" class="col-sm-3 col-form-label">Tipe</label>
          <div class="col-sm-9">
            <input name="tipe" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $barang->tipe }}">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputPassword" class="col-sm-3 col-form-label">Satuan</label>
          <div class="col-sm-9">
            <input name="satuan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $barang->satuan }}">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputPassword" class="col-sm-3 col-form-label">Spesifikasi</label>
          <div class="col-sm-9">
            <textarea name="spesifikasi" class="form-control" id="exampleFormControlTextarea1" rows="3">{{ $barang->spesifikasi }}</textarea>
          </div>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Foto</label>
            <input name="foto" type="file" class="form-control-file" id="exampleFormControlFile1">
          </div>
          <div class="form-group">
          <img src="{{asset($barang->foto)}}" class="col-md-3"/>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
          <a href="{{url()->previous()}}" class="btn btn-success">Kembali</a>
      </form>
    </div>
</div>
</div>
@endsection
