@extends('master')

@section('content')
<div class="container-fluid">
    <div class="row">
    <div class="col-md-12"> <br>
    <h1 align="middle">Daftar Mahasiswa</h1>

    <a href="{{route('mahasiswa.create')}}" > <button type="button" class="btn btn-primary my-4">Tambah</button></a>
    <table class="table">
        <thead class="thead-dark" align="middle">
          <tr class="d-flex">
            <th class="col-1" scope="col">No</th>
            <th class="col-4" scope="col">Nama</th>
            <th class="col-2" scope="col">NIM</th>
            <th class="col-2" scope="col">Kelas</th>
            <th class="col-3" scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody align="middle">
            @php
                $no=1;
            @endphp
         @foreach ($mahasiswa as $mahasiswa)
         <tr class="d-flex">
            <th class="col-1">{{$no++}}</th>
            <td class="col-4">{{$mahasiswa->nama}}</td>
            <td class="col-2">{{$mahasiswa->nim}}</td>
            <td class="col-2" >{{$mahasiswa->kelas}}</td>
            <td class="col-3">
                <a href="{{route ('mahasiswa.show', $mahasiswa->id)}}" > <button type="button" class="btn btn-warning">lihat</button></a>
                <a href="{{route ('mahasiswa.edit', $mahasiswa->id)}}"> <button type="button" class="btn btn-success">edit</button></a>
                <form style="display: inline" action="{{route('mahasiswa.destroy',$mahasiswa->id)}}" method="post">
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
