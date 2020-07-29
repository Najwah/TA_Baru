@extends('master')

@section('content')
<div class="container-fluid">
    <div class="row">

    <form action="{{route('mahasiswa.update', $mahasiswa->id)}}" method='post' enctype="multipart/form-data">
        @csrf
        @method('PUT')
          <div class="form-group">
            <label for="exampleInputEmail1">Nama</label>
            <input name="nama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $mahasiswa->nama }}">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">NIM</label>
            <input name="nim" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $mahasiswa->nim }}">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Kelas</label>
          <input name="kelas" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $mahasiswa->kelas}}">
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
