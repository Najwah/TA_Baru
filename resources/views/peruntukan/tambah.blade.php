@extends('master')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">

<form action="{{route('peruntukan.store')}}" method='post' enctype="multipart/form-data">
@csrf
  <div class="form-group">
    <label for="exampleInputEmail1">Kode</label>
    <input name="kode" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="kode peruntukan">
  </div><div class="form-group">
    <label for="exampleInputEmail1">Nama</label>
    <input name="nama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="peruntukan">
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Dosen</label>
    <select name="dosen" class="form-control" id="exampleFormControlSelect1">
        @foreach ($dosen as $dosen)
            <option value="{{$dosen->id}}">{{$dosen->nama}} | {{$dosen->jurusan}}</option>
        @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Lab</label>
    <select name="lab" class="form-control" id="exampleFormControlSelect1">
        @foreach ($lab as $lab)
            <option value="{{$lab->id}}">{{$lab->nama}} | {{$lab->kode}}</option>
        @endforeach
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
    </div>
  </div>
</div>
@endsection
