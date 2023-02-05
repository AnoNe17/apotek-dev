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
            'facebook' => 'required',
            'instagram' => 'required',
            'youtube' => 'required',
            'tokopedia' => 'required',
            'id_misi' => 'required',
            'misi' => 'required'
        ]);

        if ($validate->fails()) {
            return back()->with('failed', $validate->errors()->first());
        }

        if ($request->hasFile('logo_new')) {
            $extension = $request->logo_new->extension();
            if ($extension == 'jpeg' || $extension == 'png' || $extension == 'jpg') {
                $docName = rand() . '.' . $request->logo_new->extension();
                $request->logo_new->move(public_path('web/assets/logo/'), $docName);
            } else {
                return back()->with('failed', 'Wrong image format');
            }
        } else {
            $docName = $request->input('logo_old');
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
        $data->facebook         = $request['facebook'];
        $data->instagram        = $request['instagram'];
        $data->youtube          = $request['youtube'];
        $data->tokopedia        = $request['tokopedia'];
        $data->logo             = $docName;
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

    public function misiStore(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'judul' => 'required',
        ]);

        if ($validate->fails()) {
            return back()->with('failed', $validate->errors()->first());
        }

        $data                       = new Misi();
        $data->nama                = $request['judul'];
        $data->save();

        if ($data->save()) {
            return back()->with('success', 'Data Berhasil Di Input');
        } else {
            return back()->with('failed', 'Data Gagal Di Input');
        }
    }

    public function misiDelete(Request $request)
    {
        $data = Misi::where('id', $request['id'])->first();
        $data->delete();
    }

    public function mitraStore(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'source' => 'required',
        ]);

        if ($validate->fails()) {
            return back()->with('failed', $validate->errors()->first());
        }

        $extension = $request->source->extension();
        if ($extension == 'jpeg' || $extension == 'png' || $extension == 'jpg') {
            $docName = rand() . '.' . $extension;
            $request->source->move(public_path('web/assets/mitra/'), $docName);
        } else {
            return back()->with('failed', 'Wrong image format');
        }

        $data           = new Client();
        $data->source   = $docName;
        $data->save();

        if ($data->save()) {
            return back()->with('success', 'Data Berhasil Di Input');
        } else {
            return back()->with('failed', 'Data Gagal Di Input');
        }
    }

    public function mitraDelete(Request $request)
    {
        $data = Client::where('id', $request['id'])->first();
        $data->delete();
    }
}
