@extends('master')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
    <form action="{{route('dosen.update', $dosen->id)}}" method='post' enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="exampleInputEmail1">NIDN</label>
            <input name="nidn" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $dosen->nidn }}" >
          </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Nama</label>
            <input name="nama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $dosen->nama }}" >
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Jurusan</label>
            <input name="jurusan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $dosen->jurusan }}" >
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
          <a href="{{url()->previous()}}" class="btn btn-success">Kembali</a>
        </form>
    </div>
  </div>
</div>
@endsection
