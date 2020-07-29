@extends('master')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
    <div class="col-sm-8">
      <form class="mt-4">
        <div class="form-group row">
          <label for="inputPassword" class="col-sm-2 col-form-label">Nama</label>
          <div class="col-sm-10">
            <input name="nama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="{{ $barang->nama }}" readonly>
          </div>
        </div>
        <div class="form-group row">
          <label for="inputPassword" class="col-sm-2 col-form-label">Merk</label>
          <div class="col-sm-10">
            <input name="merk" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="{{ $barang->merk }}" readonly>
          </div>
        </div>
        <div class="form-group row">
          <label for="inputPassword" class="col-sm-2 col-form-label">Tipe</label>
          <div class="col-sm-10">
            <input name="tipe" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="{{ $barang->tipe }}" readonly>
          </div>
        </div>
        <div class="form-group row">
          <label for="inputPassword" class="col-sm-2 col-form-label">Satuan</label>
          <div class="col-sm-10">
            <input name="satuan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="{{ $barang->satuan }}" readonly>
          </div>
        </div>
        <div class="form-group row">
          <label for="inputPassword" class="col-sm-2 col-form-label">Spesifikasi</label>
          <div class="col-sm-10">
            <input name="spesifikasi" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="{{ $barang->spesifikasi }}" readonly>
          </div>
        </div>
      </form>
    </div>
    <div class="col-sm-4">
      <br><br>
      <div class="card" style="height: 100px; width:200px">
        <div class="card-footer">
          <small class="text-muted">Photo</small>
        </div>
        <img src="{{asset($barang->foto)}}"  height="200px"/>
      </div>
    </div>
  </table>
<a href="{{url()->previous()}}" class="btn btn-primary">Kembali</a>
</div>
  </div>
</div>
@endsection
