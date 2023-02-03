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
        $layanan = Layanan::get();
        $misi = Misi::get();

        return view('admin.setting.index', [
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
            'detail_alamat' => 'required',
            'id_misi' => 'required',
            'misi' => 'required'
        ]);

        if ($validate->fails()) {
            return back()->with('failed', $validate->errors()->first());
        }

        $data                   = Content::find(1);
        $data->nama             = $request['nama'];
        $data->slogan           = $request['slogan'];
        $data->visi             = $request['visi'];
        $data->telp             = $request['telp'];
        $data->email            = $request['email'];
        $data->hari_awal        = $request['hari_awal'];
        $data->hari_akhir       = $request['hari_akhir'];
        $data->jam_awal         = $request['jam_awal'];
        $data->jam_akhir        = $request['jam_akhir'];
        $data->maps             = $request['maps'];
        $data->provinsi         = $request['provinsi'];
        $data->kota             = $request['kota'];
        $data->kecamatan        = $request['kecamatan'];
        $data->kode_pos         = $request['kode_pos'];
        $data->detail_alamat    = $request['detail_alamat'];
        $data->save();


        if ($request['id_misi'] != null) {
            for ($i = 0; $i < count($request['id_misi']); $i++) {
                Misi::where('id', $request['id_misi'][$i])->update([
                    'nama' => $request['misi'][$i],
                ]);
            }
        }

        if ($request['id_layanan'] != null) {
            for ($i = 0; $i < count($request['id_layanan']); $i++) {
                Layanan::where('id', $request['id_misi'][$i])->update([
                    'judul' => $request['judul_layanan'][$i],
                    'deskripsi' => $request['deskripsi_layanan'][$i],
                ]);
            }
        }

        if ($data->save()) {
            return back()->with('success', 'Data Berhasil Di Input');
        } else {
            return back()->with('failed', 'Data Gagal Di Input');
        }
    }
}
