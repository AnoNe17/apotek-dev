<?php

namespace App\Http\Controllers;

use App\Models\Saran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class SaranController extends Controller
{
    public function index()
    {
        $saran = Saran::get();
        return view('admin.saran.index', [
            'saran' => $saran
        ]);
    }

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'pesan' => 'required',
        ]);

        if ($validate->fails()) {
            return back()->with('failed', $validate->errors()->first());
        }

        $data           = new Saran();
        $data->nama     = $request['name'];
        $data->email    = $request['email'];
        $data->saran    = $request['pesan'];
        $data->tanggal  = Carbon::now();
        $data->save();

        if ($data->save()) {
            return back()->with('success', 'Terimakasih atas kritik & saran anda');
        } else {
            return back()->with('failed', 'Data Gagal Di Input');
        }
    }
}
