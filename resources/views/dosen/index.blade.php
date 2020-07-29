@extends('master')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
    <h1 align="middle">List Nama Dosen</h1>

    <a href="{{route('dosen.create')}}" > <button type="button" class="btn btn-primary my-4">Tambah</button></a>
    <table class="table">
        <thead class="thead-dark" align="middle">
          <tr class="d-flex">
            <th class="col-1" scope="col">No</th>
            <th class="col-2" scope="col">NIDN</th>
            <th class="col-3" scope="col">Nama</th>
            <th class="col-3" scope="col">Jurusan</th>
            <th class="col-3" scope="col">Aksi</th>
          </tr>
          </tr>
        </thead>
        <tbody align="middle">
            @php
                $no=1;
            @endphp
         @foreach ($dosen as $dosen)
         <tr class="d-flex">
            <th class="col-1">{{$no++}}</th>
            <th class="col-2">{{$dosen->nidn}}</th>
            <td class="col-3">{{$dosen->nama}}</td>
            <td class="col-3">{{$dosen->jurusan}}</td>
            <td class="col-3">
                <a href="{{route ('dosen.show', $dosen->id)}}" > <button type="button" class="btn btn-warning">lihat</button></a>
                <a href="{{route ('dosen.edit', $dosen->id)}}"> <button type="button" class="btn btn-success">edit</button></a>
                <form style="display: inline" action="{{route('dosen.destroy',$dosen->id)}}" method="post">
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
