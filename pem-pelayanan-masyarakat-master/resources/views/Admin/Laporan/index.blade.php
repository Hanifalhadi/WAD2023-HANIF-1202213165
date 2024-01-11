@extends('layouts.admin')

@section('title', 'Halaman Laporan')
    
@section('header', 'Laporan Report')
    
@section('content')
    <div class="row">
        <div class="col-lg-4 col-12">
            <div class="card">
                <div class="card-header">
                    Cari Berdasarkan Tanggal

                </div>
                <div class="card-body">
                    <form action="{{ route('laporan.getLaporan')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="form" class="form-control" placeholder="Tanggal Awal"  onfocusin="(this.type='date')" onfocusout="(this.type='text')">
                        </div>
                        <div class="form-group">
                            <input type="text" name="to" class="form-control" placeholder="Tanggal Akhir" onfocusin="(this.type='date')" onfocusout="(this.type='text')">
                        </div>
                        <button type="submit" class="btn btn-purple" style="width: 100%">Cari Laporan</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-8 lg-12">
            <div class="card">
                <div class="card-header">
                    Data Berdasarkan Tanggal
                    <div class="float-right">
                        @if ($report ?? '')
                            <a href="{{ route('laporan.cetakLaporan', ['from' => $from, 'to' => $to])}}" class="btn btn-danger">EXPORT PDF</a>       
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    @if ($report ?? '')
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Isi Laporan</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($report as $k => $v)
                                    <tr>
                                        <td>{{ $k += 1}}</td>
                                        <td>{{ $v->report_date }}</td>
                                        <td>{{ $v->report_desc}}</td>
                                        @if ($v->status == '0')
                                        <a href="#" class="badge badge-danger">Pending</a>
                                        @elseif($v->status == 'proses')
                                            <a href="#" class="badge badge-warning text-white">Proses</a>
                                        @else
                                            <a href="#" class="badge badge-success">Selesai</a>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="text-center">
                            Tidak ada data 
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection