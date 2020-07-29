@extends('master')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">

    <form>
        <div class="form-group">
            <label for="exampleInputEmail1">NIDN</label>
            <input name="nidn" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="{{ $dosen->nidn}}" readonly>
          </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Nama</label>
            <input name="nama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="{{ $dosen->nama }}" readonly>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Jurusan</label>
            <input name="jurusan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="{{ $dosen->jurusan }}" readonly>
          </div>
          <a href="{{url()->previous()}}" class="btn btn-primary">Kembali</a>
        </form>
    </div>
  </div>
</div>
@endsection
