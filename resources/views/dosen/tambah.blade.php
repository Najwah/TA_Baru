@extends('master')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">

<form action="{{route('dosen.store')}}" method='post' enctype="multipart/form-data">
@csrf
<div class="form-group">
    <label for="exampleInputEmail1">NIDN</label>
    <input name="nidn" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="NIDN Dosen">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Nama</label>
    <input name="nama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama dosen">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Jurusan</label>
    <input name="jurusan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Jurusan dosen">
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
    </div>
  </div>
</div>
@endsection
