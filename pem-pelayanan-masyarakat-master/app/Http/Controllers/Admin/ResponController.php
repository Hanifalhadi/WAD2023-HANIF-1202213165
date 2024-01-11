<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Report;
use App\Models\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResponController extends Controller
{
    public function createOrUpdate(Request $request)
    {
        $report = Report::where('report_id', $request->report_id)->first();

        $response = Response::where('report_id', $request->report_id)->first();

        if ($response) {
           $report->update(['status' => $request->status]);

            $response->update([
                'response_date' => date('Y-m-d'),
                'response' => $request->response,
                'id_petugas' => Auth::guard('admin')->user()->id_petugas,
            ]);

            return redirect()->route('report.show', ['report' => $report, 'response' => $response]);
        } else {
            $report = Report::where('report_id', $request->report_id)->first();

            $response = Response::create([
                'report_id' => $request->report_id,
                'response_date' => date('Y-m-d'),
                'response' => $request->response,
                'id_petugas' => Auth::guard('admin')->user()->id_petugas,
            ]);
            return redirect()->route('report.show', ['report' => $report, 'response'=> $response])->with(['status' => 'BERHASIL DIKIRIM!']);
        }
    }

}
