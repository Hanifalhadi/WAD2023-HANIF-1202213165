<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Civitas;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        $report = Report::count();

        return view('user.landing', [
            'report' => $report
        ]);
    }

    public function login(Request $request)
    {
        $username = Civitas::where('username', $request->username)->first();

        if (!$username) {
            return redirect()->back()->with(['pesan' => 'Username tidak terdaftar']);
        }

        $password = Hash::check($request->password, $username->password);

        if (!$password) {
            return redirect()->back()->with(['pesan' => 'Password tidak sesuai']);
        }

        if (Auth::guard('civitas')->attempt(['username' => $request->username, 'password' => $request->password])) {
            return redirect()->back();
        } else {
            return redirect()->back()->with(['pesan' => 'Akun tidak terdaftar!']);
        }
    }

    public function formRegister()
    {
        return view('user.register');
    }

    public function register(Request $request)
    {
        $data = $request->all();

        $validate = Validator::make($data, [
            'civitas_id' => ['required'],
            'name' => ['required'],
            'username' => ['required'],
            'password' => ['required'],
            'no_telp' => ['required'],
        ]);

        if ($validate->fails()) {
            return redirect()->back()->with(['pesan' => $validate->errors()]);
        }

        $username = Civitas::where('username', $request->username)->first();

        if ($username) {
            return redirect()->back()->with(['pesan' => 'Username sudah terdaftar']);
        }

        Civitas::create([
            'civitas_id' => $data['civitas_id'],
            'name' => $data['name'],
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
            'no_telp' => $data['no_telp'],
        ]);

        return redirect()->route('pekat.index');
    }

    public function logout()
    {
        Auth::guard('civitas')->logout();

        return redirect()->back();
    }

    public function storeReport(Request $request)
    {
        if (!Auth::guard('civitas')->user()) {
            return redirect()->back()->with(['pesan' => 'Login dibutuhkan!'])->withInput();
        }

        $data = $request->all();

        $validate = Validator::make($data, [
            'report_desc' => ['required'],
        ]);

        if ($validate->fails()) {
            return redirect()->back()->withInput()->withErrors($validate);
        }

        if ($request->file('evidence')) {
            $data['evidence'] = $request->file('evidence')->store('assets/report', 'public');
        }

        date_default_timezone_set('Asia/Bangkok');

        $report = Report::create([
            'report_date' => date('Y-m-d h:i:s'),
            'civitas_id' => Auth::guard('civitas')->user()->civitas_id,
            'report_desc' => $data['report_desc'],
            'evidence' => $data['evidence'] ?? '',
            'status' => '0',
        ]);

        if ($report) {
            return redirect()->route('pekat.laporan', 'me')->with(['report' => 'Berhasil terkirim!', 'type' => 'success']);
        } else {
            return redirect()->back()->with(['report' => 'Gagal terkirim!', 'type' => 'danger']);
        }
    }

    public function laporan($siapa = '')
    {
        $terverifikasi = Report::where([['civitas_id', Auth::guard('civitas')->user()->civitas_id], ['status', '!=', '0']])->get()->count();
        $proses = Report::where([['civitas_id', Auth::guard('civitas')->user()->civitas_id], ['status', 'proses']])->get()->count();
        $selesai = Report::where([['civitas_id', Auth::guard('civitas')->user()->civitas_id], ['status', 'selesai']])->get()->count();

        $hitung = [$terverifikasi, $proses, $selesai];

        if ($siapa == 'me') {
            $report = Report::where('civitas_id', Auth::guard('civitas')->user()->civitas_id)->orderBy('report_date', 'desc')->get();

            return view('user.laporan', ['report' => $report, 'hitung' => $hitung, 'siapa' => $siapa]);
        } else {
            $report = Report::where([['civitas_id', '!=', Auth::guard('civitas')->user()->civitas_id], ['status', '!=', '0']])->orderBy('report_date', 'desc')->get();

            return view('user.laporan', ['report' => $report, 'hitung' => $hitung, 'siapa' => $siapa]);
        }
    }
}
