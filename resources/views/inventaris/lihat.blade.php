@extends('master')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">

    <form>

          <div class="form-group">
            <label for="exampleInputEmail1">Kode</label>
            <input name="kode" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="{{ $peruntukan->kode }}" readonly>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Nama</label>
            <input name="nama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="{{ $peruntukan->nama }}" readonly>
          </div>
        </form>
    </div>
  </div>
</div>
@endsection
