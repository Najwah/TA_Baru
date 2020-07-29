@extends('master')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
<div class="row" style="padding: 10px">
    <div class="col-md-8">
        <div  class="row card">
            <div class="row" style="padding-left: 10px">
                <p class="col-md-7" style="padding: 10px">Data Peminjam :</p>
                <p align="right"><a href="#" class="btn btn-success btn-sm" style="margin-top: 5px; align='right'">Checkout</a></p>
            </div>
            <form method="POST" action="">
                @csrf
      <div class="row col-md-12">
        <div class="form-group col-md-6">
            <label for="exampleInputEmail1">Nama Dosen Peminjam</label>
            <input name="nama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="lab">
          </div>
          <div class="form-group col-md-6">
            <label for="exampleInputEmail1">Jurusan</label>
            <input name="nama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="lab">
          </div>
          <div class="form-group col-md-6">
            <label for="exampleInputEmail1">Program Studi</label>
            <input name="nama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="lab">
          </div>
          <div class="form-group col-md-6">
            <label for="exampleInputEmail1">Nama Kegiatan</label>
            <input name="nama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="lab">
          </div>
          <div class="form-group col-md-6">
            <label for="exampleInputEmail1">Tanggal Meminjam</label>
            <input name="nama" type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="lab">
          </div>
          <div class="form-group col-md-6">
            <label for="exampleInputEmail1">Tanggal Pengembalian</label>
            <input name="nama" type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="lab">
          </div>
          <div class="form-group col-md-6">
              <label>Kelas</label>
            <select class="form-control">
                <option value="kelas">D3TI1C</option>
                <option value="kelas">D3TI2C</option>
                <option value="kelas">D3TI3C</option>
                <option value="kelas">D3TI1B</option>
                <option value="kelas">D3TI2B</option>
            </select>
          </div>
          <div class="form-group col-md-6">
            <label>Nama Mahasiswa</label>
          <select class="form-control">
              <option value="kelas">NAJWAH</option>
              <option value="kelas">IIS</option>
              <option value="kelas">DIYANTO</option>
              <option value="kelas">UMI</option>
              <option value="kelas">ADYAR</option>
          </select>
        </div>
      </div>
    </form>
</div>
<br>
    <div class="row card">
        <p class="label card-title" style="padding : 10px; margin:10px">Barang yang dipinjam :</p>
      <div class="card-body">
        <table class="table table-striped  data-table">
            <thead>
                <tr>
                    <td>No</td>
                    <td>Nama Barang</td>
                    <td>No Inventaris</td>
                    <td>Jumlah</td>
                    <td>Ket</td>
                    <td>Aksi</td>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
      </div>
    </div>
    </div>
    <div class="col-md-4">
        <table class="table table-striped " id="myTable">
            <thead>
                <tr>
                    <td>No</td>
                    <td>Nama Barang</td>
                    <td>Status</td>
                    <td>Aksi</td>
                </tr>
            </thead>
            <tbody>
                @foreach($barang as $data)
                    <tr>
                        <td>{{++$no}}</td>
                        <td>{{$data->nama}}</td>
                        <td><span class='label label-warning'>tersedia</span></td>
                        <td>
                            <button id="tambahBtn" data-id='{{$data->id}}' class='btn btn-sm btn-primary'><i class='fa' id="dipinjam" aria-hidden='true'>Tambah</i></button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
    </div>
  </div>
</div>
@endsection

@section("skrip")
<script type="text/javascript">
$(document).ready(function(){
    $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });

    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('get.datatables.ker') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
            {data: 'nama', name: 'barangs.nama'},
            {data: 'no_inventaris', name: 'no_inventaris'},
            {data: 'jumlah', name: 'jumlah'},
            {data: 'ket', name: 'ket'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });

    $('#myTable').DataTable();

    $('body').on('click','#tambahBtn',function(){
        var id = $(this).data('id');
        $(this).removeClass('btn-primary');
        $(this).addClass('btn-success');
        $('#dipinjam').html('Dipinjam');
        $.ajax({
            type: "GET",
            url: "tambah-barang/"+id,
            success:function(data){
                table.draw();
            }
        });
    });

    $('body').on('click','#hapusBtn',function(){
        var id = $(this).data('id');
        $.ajax({
            type : "GET",
            url : "hapus-barang/"+id,
            success:function(data){
                table.draw();
            }
        });
    });

});
</script>
@endsection
