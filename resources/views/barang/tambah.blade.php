@extends('master')

@section('content')
<div class="container-fluid">
<div class="row">
{{-- @endsection --}}

{{-- @section('main') --}}

{{-- <div class="row"> --}}
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
      <form class="mt-12" action="{{route('barang.store')}}" method='post' enctype="multipart/form-data">
        @csrf
        <div class="form-group row">
          <label for="inputPassword" class="col-sm-3 col-form-label">Nama</label>
          <div class="col-sm-9">
            <input name="nama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan Nama BArang">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputPassword" class="col-sm-3 col-form-label">Merk</label>
          <div class="col-sm-9">
            <input name="merk" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan Merk Barang">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputPassword" class="col-sm-3 col-form-label">Tipe</label>
          <div class="col-sm-9">
            <input name="tipe" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan Tipe Barang">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputPassword" class="col-sm-3 col-form-label">Satuan</label>
          <div class="col-sm-9">
            <input name="satuan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Satuan Barang">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputPassword" class="col-sm-3 col-form-label">Spesifikasi</label>
          <div class="col-sm-9">
            <textarea name="spesifikasi" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Spesifikasi Barang"></textarea>
          </div>
        </div>
        <div class="form-group row">
            {{-- <div class="card" style="height: 100px; width:200px"> --}}
              <label for="exampleInputEmail1" class="col-sm-3 col-form-label">Foto</label>
              <div class="col-sm-9">
              <input name="foto" type="file" accept="image/jpg,image/png,image/jpeg" class="form-control-file" id="exampleFormControlFile1">
              </div>
            {{-- </div> --}}
          </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
</div>
</div>
@endsection
