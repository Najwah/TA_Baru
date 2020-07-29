@extends('master')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
    <h1 align="middle">Daftar Barang</h1>

    <a href="{{route('barang.create')}}" > <button type="button" class="btn btn-primary my-4">Tambah</button></a>
    <table class="table">
        <thead class="thead-dark" align="middle">
          <tr class="d-flex">
            <th class="col-1" scope="col">No</th>
            <th class="col-1" scope="col">Kode</th>
            <th class="col-2" scope="col">Nama</th>
            <th class="col-1" scope="col">Tipe</th>
            <th class="col-2" scope="col">Merk</th>
            <th class="col-2" scope="col">Foto</th>
            <th class="col-3" scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody align="middle">
            @php
                $no=1;
            @endphp
         @foreach ($barang as $barang)
         <tr class="d-flex">
            <th class="col-1">{{$no++}}</th>
            <td class="col-1">{{$barang->kode}}</td>
            <td class="col-2">{{$barang->nama}}</td>
            <td class="col-1">{{$barang->tipe}}</td>
            <td class="col-2" >{{$barang->merk}}</td>
            <td class="col-2"> <img src="{{asset($barang->foto)}}" class="img-fluid"/></td>
            <td class="col-3">
                <a href="{{route ('barang.show', $barang->id)}}" > <button type="button" class="btn btn-warning">lihat</button></a>
                <a href="{{route ('barang.edit', $barang->id)}}"> <button type="button" class="btn btn-success">edit</button></a>
                <form style="display: inline" action="{{route('barang.destroy',$barang->id)}}" method="post">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger">hapus</button>
                </form>
            </td>
        </tr>

          @endforeach
        </tbody>
      </table>
    </div>
    </div>
</div>
@endsection
