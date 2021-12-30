@extends('adminlte::page')
@section('content_header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="m-0">Jadwal Dokter</h1>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    KELUHAN
                    <a href="{{route('jadwal_dokter.create')}}" class="btn btn-sm btn-outline-primary float-right">Tambah Kategori</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="example">
                            <thead>
                                <tr>
                                    <th>Nomor</th>
                                    <th>Kategori</th>
                                    <th>Keterangan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                    @php $no=1; @endphp
                                    @foreach ($jadwal_dokter as $data)
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>{{$data->nama_kategori}}</td>
                                        <td>{{$data->keterangan}}</td>
                                        <td>
                                            <form action="{{route('jadwal_dokter .destroy',$data->id)}}" method="post">
                                                @method('delete')
                                                @csrf
                                                <a href="{{route('jadwal_dokter .edit',$data->id)}}" class="btn btn-outline-info">Edit</a>
                                                <a href="{{route('jadwal_dokter .show',$data->id)}}" class="btn btn-outline-warning">Show</a>
                                                <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Apakah anda yakin menghapusnya')">Hapus</button>
                                                </form>
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
</div>
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('DataTables/datatables.min.css') }}">
@endsection

@section('js')
<script src="{{asset('Datatables/datatables.min.js')}}"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
@endsection
