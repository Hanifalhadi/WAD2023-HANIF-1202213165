@extends('layouts.admin')

@section('title', 'Detail Report')
    
@section('css')
    <style>
        .text-primary:hover{
            text-decoration-line: underline;
        }
        .text-grey{
            color: #6c757d;
        }
        .text-grey:hover{
            color: #6c757d;
        }
        .btn-purple{
            background: #6c757d;
            border: 1px solid #6c757d;
            color: white;
            width: 100%;
        }
    
    </style>
@endsection

@section('header')
    <a href="{{ route('report.index')}}" class="text-primary">Data Report</a>
    <a href="#" class="text-grey">/</a>
    <a href="#" class="text-grey">Detail Report</a>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-6 col-12">
            <div class="card">
                <div class="card-header">
                    <div class="text-center">
                        Report Civitas
                    </div>
                </div>
            <div class="card-body">
                <table class="table">
                    <tbody>
                        <tr>
                            <th>civitas_id</th>
                            <td>:</td>
                            <td>{{ $report->civitas_id}}</td>
                        </tr>
                        <tr>
                            <th>Tanggal</th>
                            <td>:</td>
                            <td>{{ $report->report_date}}</td>
                        </tr>
                        <tr>
                            <th>Evidence</th>
                            <td>:</td>
                            <td><img src="{{ Storage::url($report->evidence)}}" alt="evidence-report" class="embed-responsve"></td>
                        </tr>
                        <tr>
                            <th>Isi Laporan</th>
                            <td>:</td>
                            <td>{{ $report->report_desc}}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>:</td>
                            <td> @if ($report->status == '0')
                                <a href="#" class="badge badge-danger">Pending</a>
                            @elseif($report->status == 'proses')
                                <a href="#" class="badge badge-warning text-white">Proses</a>
                            @else
                                <a href="#" class="badge badge-success">Selesai</a>
                            @endif
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-12">
            <div class="card">
                <div class="card-header">
                    <div class="text-center">
                        Response Petugas
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('response.createOrUpdate')}}" method="POST">
                        @csrf
                        <input type="hidden" name="report_id" value="{{ $report->report_id }}">
                        <div class="from-group">
                            <label for="status">Status</label>
                            <div class="input-group mb-3">
                                <select name="status" id="status" class="custom-select">
                                    @if ($report->status == '0')
                                        <option selected value="0">Pending</option>
                                        <option value="proses">Proses</option>
                                        <option value="selesai">Selesai</option>
                                    @elseif($report->status == 'proses')
                                        <option value="0">Pending</option>
                                        <option selected value="proses">Proses</option>
                                        <option value="selesai">Selesai</option>
                                    @else
                                        <option value="0">Pending</option>
                                        <option value="proses">Proses</option>
                                        <option selected value="selesai">Selesai</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="from-group">
                            <label for="response">Response</label>
                            <textarea name="response" id="response" rows="4" class="form-control" placeholder="Belum ada response">{{ $response->response ?? '' }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-purple">KIRIM</button>
                    </form>
                    @if (Session::has('status'))
                        <div class="alert alert-success mt-2">
                            {{ Session::get('status')}}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection