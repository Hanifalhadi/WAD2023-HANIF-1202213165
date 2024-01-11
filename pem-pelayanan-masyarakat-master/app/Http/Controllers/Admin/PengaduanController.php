<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Report;
use App\Models\Response; 
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $report = Report::orderBy('report_date', 'desc')->get();

        return view('Admin.Report.index', ['report' => $report]);
    }

    public function show($report_id)
    {
        $report = Report::where('report_id', $report_id)->first();

        $response = Response::where('report_id', $report_id)->first();

        return view('Admin.Report.show', ['report' => $report , 'response' => $response]);
    }
}
