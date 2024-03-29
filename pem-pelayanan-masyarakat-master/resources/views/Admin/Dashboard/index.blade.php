@extends('layouts.admin')


@section('title', 'Halaman Dashoard')

@section('header', 'Dashboard')

@section('content')
    <div class="row">
        <div class="col-lg-3">
            <div class="card">
                <div class="card-header">Petugas</div>
                <div class="card-body">
                    <div class="text-center">
                        {{ $petugas }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card">
                <div class="card-header">Warga</div>
                <div class="card-body">
                    <div class="text-center">
                        {{ $civitas }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card">
                <div class="card-header">Report Proses</div>
                <div class="card-body">
                    <div class="text-center">
                        {{ $proses }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card">
                <div class="card-header">Report Kondisi</div>
                <div class="card-body">
                    <div class="text-center">
                        {{ $selesai }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection