@extends('master')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">

<form action="{{route('lab.store')}}" method='post' enctype="multipart/form-data">
@csrf
  <div class="form-group">
    <label for="exampleInputEmail1">Nama</label>
    <input name="nama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="lab">
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
    </div>
  </div>
</div>
@endsection
