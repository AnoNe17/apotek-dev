<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LayananController extends Controller
{
    public function index()
    {
        $layanan = Layanan::get();
        return view('admin.layanan.index', [
            'layanan' => $layanan
        ]);
    }

    public function create()
    {
        return view('admin.layanan.create');
    }
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'judul' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required',
        ]);

        if ($validate->fails()) {
            return back()->with('failed', $validate->errors()->first());
        }

        $ext_doc = $request->gambar->extension();
        if ($ext_doc == 'jpeg' || $ext_doc == 'png' || $ext_doc == 'jpg') {
            $docName = rand() . '.' . $ext_doc;
            $request->gambar->move(public_path('web/assets/layanan/'), $docName);
        } else {
            return back()->with('failed', 'Wrong image format');
        }

        $data               = new Layanan();
        $data->judul        = $request['judul'];
        $data->deskripsi    = $request['deskripsi'];
        $data->gambar       = $docName;

        if ($data->save()) {
            return redirect()->route('layanan')->with('success', 'Data Berhasil Di Input');
        } else {
            return back()->with('failed', 'Data Gagal Di Input');
        }
    }

    public function edit($id)
    {
        $layanan = Layanan::where('id', $id)->first();
        return view('admin.layanan.edit', [
            'layanan' => $layanan
        ]);
    }

    public function update(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'id_layanan' => 'required',
            'judul' => 'required',
            'deskripsi' => 'required',
        ]);

        if ($validate->fails()) {
            return back()->with('failed', $validate->errors()->first());
        }

        if ($request->hasFile('layanan_new')) {
            $extension = $request->layanan_new->extension();
            if ($extension == 'jpeg' || $extension == 'png' || $extension == 'jpg') {
                $docName = rand() . '.' . $request->layanan_new->extension();
                $request->layanan_new->move(public_path('web/assets/layanan/'), $docName);
            } else {
                return back()->with('failed', 'Wrong image format');
            }
        } else {
            $docName = $request->input('layanan_old');
        }

        $data               = Layanan::find($request['id_layanan']);
        $data->judul        = $request['judul'];
        $data->deskripsi    = $request['deskripsi'];
        $data->gambar       = $docName;
        $data->save();

        if ($data->save()) {
            return redirect()->route('layanan')->with('success', 'Data Berhasil Di Input');
        } else {
            return back()->with('failed', 'Data Gagal Di Input');
        }
    }

    public function Delete(Request $request)
    {
        $data = Layanan::where('id', $request['id'])->first();
        $data->delete();
    }
}
