<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Civitas;
use Illuminate\Http\Request;

class CivitasController extends Controller
{
    public function index()
    {

      $civitas = Civitas::all();

       return view('Admin.Civitas.index', ['civitas' => $civitas ]);
    }

    public function show($civitas_id)
    {

      $civitas = Civitas::where('civitas_id', $civitas_id)->first();

       return view('Admin.Civitas.show', ['civitas' => $civitas]);
    }
}
