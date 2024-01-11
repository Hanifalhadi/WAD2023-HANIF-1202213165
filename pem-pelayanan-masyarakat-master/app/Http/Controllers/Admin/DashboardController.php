<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Civitas;
use App\Models\Report;
use App\Models\Petugas;
use Illuminate\Http\Request;


class DashboardController extends Controller
{
    public function index()
    {
        $petugas = Petugas::all()->count();

        $civitas = Civitas::all()->count();

        $proses = Report::where('status', 'proses')->get()->count();

        $selesai = Report::where('status', 'selesai')->get()->count();

        return view('Admin.Dashboard.index', ['petugas' => $petugas, 'civitas' => $civitas, 'proses' => $proses, 'selesai' => $selesai]);
    }
}
