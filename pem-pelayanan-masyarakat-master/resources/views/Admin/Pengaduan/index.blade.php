@extends('layouts.admin')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
@endsection

@section('header', 'Data Report')
    
@section('content')
    <table id="reportTable"class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Isi Laporan</th>
                <th>Status</th>
                <th>Detail</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($report as $k => $v)
            <tr>
                <td>{{ $k +- 1}}</td>
                <td>{{ $v->report_date->format('d-M-Y')}}</td>
                <td>{{ $v->report_desc}}</td>
                <td>
                    @if ($v->status == '0')
                        <a href="#" class="badge badge-danger">Pending</a>
                    @elseif($v->status == 'proses')
                        <a href="#" class="badge badge-warning text-white">Proses</a>
                    @else
                        <a href="#" class="badge badge-success">Selesai</a>
                    @endif
                </td>
                <td>
                    <a href="{{ route('report.show', $v->report_id)}}" style="text-decoration:underline">Lihat</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@section('js')
   <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
        $('#reportTable').DataTable();
    });
    </script>
@endsection