<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Report;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        return view('Admin.Laporan.index');
    }
     
    public function getLaporan(Request $request)
    {
        $form = $request->from . ' ' . '00:00:00';
        $to = $request->to . ' ' . '23:59:59';

        $report = Report::whereBetWeen('report_date', [$form , $to])->get();

        return view('Admin.Laporan.index', ['report' => $report, 'from' =>$form, 'to' => $to]);
    }
    public function cetakLaporan($form, $to)
    {
       $report = Report::whereBetween('report_date', [$form, $to])->get();

       $pdf = FacadePdf::loadView('Admin.Laporan.cetak', ['report' => $report]);
       return $pdf->download('laporan-pennaduan.pdf');
    }
} 
