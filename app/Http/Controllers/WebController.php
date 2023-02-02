<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Content;
use App\Models\Layanan;
use App\Models\Misi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WebController extends Controller
{
    public function index()
    {
        $client = Client::get();
        $content = Content::first();
        $layanan = Layanan::first();
        $misi = Misi::get();
        $sidebar = 'pengaturan';

        return view('admin.setting.index', [
            'sidebar' => $sidebar,
            'client' => $client,
            'content' => $content,
            'layanan' => $layanan,
            'misi' => $misi,
        ]);
    }

    public function update(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'nama' => 'required',
            'slogan' => 'required',
            'visi' => 'required',
            'telp' => 'required',
            'email' => 'required',
            'hari_awal' => 'required',
            'hari_akhir' => 'required',
            'jam_awal' => 'required',
            'jam_akhir' => 'required',
            'maps' => 'required',
            'provinsi' => 'required',
            'kota' => 'required',
            'kecamatan' => 'required',
            'kode_pos' => 'required',
            'alamat' => 'required',
        ]);

        if ($validate->fails()) {
            return $validate->errors()->first();
        }
        return $request;
    }
}
