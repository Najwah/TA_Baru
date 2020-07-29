@extends('master')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
    <h1 align="middle">Daftar Peminjaman</h1>

    <a href="{{route('peminjaman.create')}}" > <button type="button" class="btn btn-primary my-4">Tambah</button></a>
    <table class="table">
        <thead class="thead-dark" align="middle">
          <tr class="d-flex">
            <th class="col-1" scope="col">No</th>
            <th class="col-2" scope="col">Nama Dosen Peminjam</th>
            <th class="col-2" scope="col">Tanggal Peminjaman</th>
            <th class="col-2" scope="col">Tanggal Rencana pengembalian</th>
            <th class="col-2" scope="col">Total Barang Yang Dipinjam</th>
            <th class="col-1" scope="col">Status</th>
            </th>
            <th class="col-2" scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody align="middle">
            @php
                $no=1;
            @endphp
         {{-- @foreach ($peminjaman as $peminjaman) --}}
         <tr class="d-flex">
            <th class="col-1">{{$no++}}</th>
            <td class="col-2">Adi Suheryadi, S.ST., M.Kom</td>
            <td class="col-2">15/07/2020</td>
            <td class="col-2" >15/07/2020</td>
            <td class="col-2" >2</td>
            <td class="col-1" ><span class="label label-warning">Dipinjam</span></td>
            <td class="col-2">
                <a href="#" > <button type="button" class="btn btn-warning">lihat</button></a>
                <a href="#"> <button type="button" class="btn btn-success">edit</button></a>
                <a href="#"><button type="submit" class="btn btn-danger">hapus</button></a>
                {{-- <form style="display: inline" action="{{route('peminjaman.destroy',$peminjaman->id)}}" method="post">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger">hapus</button>
                </form> --}}
            </td>
        </tr>
          {{-- @endforeach --}}
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
