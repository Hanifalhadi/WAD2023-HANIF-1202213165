@extends('layouts.admin')

@section('title', 'Detail Warga')
    
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
    </style>
@endsection

@section('header')
    <a href="{{ route('civitas.index')}}" class="text-primary">Data Civitas</a>
    <a href="#" class="text-grey">/</a>
    <a href="#" class="text-grey">Detail Civitas</a>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-6 col-12">
            <div class="card">
                <div class="card-header">
                    <div class="text-center">Detail Civitas
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <tbody>
                        <tr>
                            <th>civitas_id</th>
                            <td>:</td>
                            <td>{{ $civitas->civitas_id }}</td>
                        </tr>
                        <tr>
                            <th>Name</th>
                            <td>:</td>
                            <td>{{  $civitas->name }}</td>
                        </tr>
                        <tr>
                            <th>Username</th>
                            <td>:</td>
                            <td>{{  $civitas->username }}</td>
                        </tr>
                        <tr>
                            <th>No Telp</th>
                            <td>:</td>
                            <td>{{  $civitas->no_telp }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection