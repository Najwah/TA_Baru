{{-- @extends('master')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-9">
      <form class="mt-4">
        <div class="form-group row">
          <label for="inputPassword" class="col-sm-3 col-form-label">Nama</label>
          <div class="col-sm-9">
            <input name="nama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="{{ $barang->nama }}" readonly>
          </div>
        </div>
        <div class="form-group row">
          <label for="inputPassword" class="col-sm-3 col-form-label">Merk</label>
          <div class="col-sm-9">
            <input name="merk" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="{{ $barang->merk }}" readonly>
          </div>
        </div>
        <div class="form-group row">
          <label for="inputPassword" class="col-sm-3 col-form-label">Tipe</label>
          <div class="col-sm-9">
            <input name="tipe" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="{{ $barang->tipe }}" readonly>
          </div>
        </div>
        <div class="form-group row">
          <label for="inputPassword" class="col-sm-3 col-form-label">Satuan</label>
          <div class="col-sm-9">
            <input name="satuan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="{{ $barang->satuan }}" readonly>
          </div>
        </div>
        <div class="form-group row">
          <label for="inputPassword" class="col-sm-3 col-form-label">Spesifikasi</label>
          <div class="col-sm-9">
            <input name="spesifikasi" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="{{ $barang->spesifikasi }}" readonly>
          </div>
        </div>
      </form>
    </div>
    <div class="col-sm-3">
      <br><br>
      <div class="card" style="height: 100px; width:200px">
        <div class="card-footer">
          <small class="text-muted">Photo</small>
        </div>
        <img src="{{asset($barang->foto)}}"  height="200px"/>
      </div>
    </div>
<a href="{{url()->previous()}}" class="btn btn-primary">Kembali</a>
</div>
    </div>
@endsection --}}

@extends('master')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
    <h1 align="middle">Data Jenis Barang</h1>

    <a href="{{route('inventaris.create')}}" > <button type="button" class="btn btn-primary my-4">Tambah</button></a>
    <table class="table">
        <thead class="thead-dark" align="middle">
          <tr class="d-flex">
            <th class="col-1" scope="col">No</th>
            <th class="col-3" scope="col">Nama barang</th>
            <th class="col-2" scope="col">Nomor Inventaris</th>
            <th class="col-1" scope="col">Sumber Dana</th>
            <th class="col-2" scope="col">Peruntukan</th>
            <th class="col-3" scope="col">Aksi</th>
          </tr>
        </thead>
         <tbody align="middle">
            @php
                $no=1;
            @endphp
         @foreach ($barangs as $barang)
         <tr class="d-flex">
            <th class="col-1">{{$no++}}</th>
            <td class="col-3">{{$barang->barang->nama}}</td>
            <td class="col-2">{{$barang->nomor_inventaris}}</td>
            <td class="col-1">{{$barang->sumberDana->nama}}</td>
            <td class="col-2" >{{$barang->peruntukan->nama}}</td>
            {{-- <td class="col-2"> <img src="{{asset($barang->foto)}}" class="img-fluid"/></td> --}}
            <td class="col-3">
                <a href="{{route ('barang.show', $barang->id)}}" > <button type="button" class="btn btn-warning">lihat</button></a>
                <a href="{{route ('barang.edit', $barang->id)}}"> <button type="button" class="btn btn-success">edit</button></a>
                {{-- <form style="display: inline" action="{{route('barang.destroy',$barang->id)}}" method="post">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger">hapus</button>
                </form> --}}
            </td>
        </tr>

          @endforeach
        </tbody>
      </table>
    </div>
    </div>
</div>
@endsection
