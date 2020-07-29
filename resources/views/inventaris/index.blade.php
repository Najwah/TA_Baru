@extends('master')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
    <h1 align="middle">Daftar Inventaris</h1>

    <a href="{{route('inventaris.create')}}" > <button type="button" class="btn btn-primary my-4">Tambah</button></a>
    <table class="table">
        <thead class="thead-dark" align="middle">
          <tr class="d-flex">
            <th class="col-1" scope="col">No</th>
            <th class="col-2" scope="col">Nama Barang</th>
            <th class="col-2" scope="col">Nomor Inventaris</th>
            {{-- <th class="col-1" scope="col">Tahun Perolehan</th> --}}
            <th class="col-1" scope="col">Sumber Dana</th>
            {{-- <th class="col-1" scope="col">Kondisi</th> --}}
            {{-- <th class="col-1" scope="col">Tempat</th> --}}
            {{-- <th class="col-1" scope="col">Jenis Barang</th> --}}
            <th class="col-3" scope="col">Peruntukan</th>
            <th class="col-3" scope="col">Aksi</th>
          </tr>
          </tr>
        </thead>
        <tbody align="middle">
            @php
                $no=1;
                // var_dump($inventaris);exit();
            @endphp
         @foreach ($inventaris as $inventaris)
         <tr class="d-flex">
            <th class="col-1">{{$no++}}</th>
            <td class="col-2">{{$inventaris->barang->nama}}</td>
            <td class="col-2">{{$inventaris->nomor_inventaris}}</td>
            {{-- <td class="col-1">{{$inventaris->tahun_perolehan}}</td> --}}
            <td class="col-1">{{$inventaris->sumberDana->nama}}</td>
            {{-- <td class="col-1">

                @php
                    if($inventaris->kondisi=="BL"){
                        echo "Baik & Lengkap";
                    }elseif ($inventaris->kondisi=="BT") {
                        echo "Baik Tidak Lengkap";
                    }else if($inventaris->kondisi=="RR"){
                        echo "Rusak Ringan";
                    }else {
                        echo "Rusak Berat";
                    }
                @endphp
            </td> --}}
            {{-- <td class="col-1">{{$inventaris->tempat}}</td> --}}
            {{-- <td class="col-1">
                @if ($inventaris->habis_pakai)
                    {{"Habis Pakai"}}
                @else
                    {{"Barang Modal"}}
                @endif
            </td> --}}
            <td class="col-3">{{$inventaris->peruntukan->nama}}</td>
            <td class="col-3">
                <a href="{{route ('inventaris.show', $inventaris->id)}}" > <button type="button" class="btn btn-warning">lihat</button></a>
                <a href="{{route ('inventaris.edit', $inventaris->id)}}"> <button type="button" class="btn btn-success">edit</button></a>
                <form style="display: inline" action="{{route('inventaris.destroy',$inventaris->id)}}" method="post">
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
