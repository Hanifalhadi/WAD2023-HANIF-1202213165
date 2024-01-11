@extends('layouts.admin')

@section('title', 'Halaman Civitas')
    
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
@endsection

@section('header', 'Data Civitas')

@section('content')
    <table id="civitasTable"class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>civitas_id</th>
                <th>Name</th>
                <th>Username</th>
                <th>Telp</th>
                <th>Detail</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($civitas as $k => $v)
            <tr>
                <th>{{ $k += 1 }}</th>
                <th>{{ $v->civitas_id }}</th>
                <th>{{ $v->name }}</th>
                <th>{{ $v->username }}</th>
                <th>{{ $v->no_telp }}</th>
                <th><a href="{{ route('civitas.show', $v->civitas_id)}}" style="text-decoration: underline">Lihat</a></th>
            </tr>
            @endforeach
        </tbody>
    </table>
    
@endsection

@section('js')
   <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
        $('#civitasTable').DataTable();
    });
    </script>
@endsection