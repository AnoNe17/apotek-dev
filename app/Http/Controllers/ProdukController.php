<?php

namespace App\Http\Controllers;

use App\Models\ProdukKategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProdukController extends Controller
{
    public function kategori()
    {
        $kategori = ProdukKategori::get();
        return view('admin.produk.kategori', [
            'kategori' => $kategori
        ]);
    }

    public function kategoriCreate()
    {
        return view('admin.produk.kategoriCreate');
    }

    public function kategoriStore(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'nama' => 'required'
        ]);

        if ($validate->fails()) {
            return back()->with('failed', $validate->errors()->first());
        }

        $data                       = new ProdukKategori();
        $data->nama                = $request['nama'];
        $data->save();

        if ($data->save()) {
            return redirect()->route('produk.kategori')->with('success', 'Data Berhasil Di Input');
        } else {
            return back()->with('failed', 'Data Gagal Di Input');
        }
    }

    public function kategoriEdit($id)
    {
        $kategori = ProdukKategori::where('id', $id)->first();
        return view('admin.produk.kategoriEdit', [
            'kategori' => $kategori
        ]);
    }

    public function kategoriUpdate(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'nama' => 'required',
        ]);

        if ($validate->fails()) {
            return back()->with('failed', $validate->errors()->first());
        }

        $data          = ProdukKategori::find($request['id_kategori']);
        $data->nama    = $request['nama'];
        $data->save();

        if ($data->save()) {
            return redirect()->route('produk.kategori')->with('success', 'Data Berhasil Di Input');
        } else {
            return back()->with('failed', 'Data Gagal Di Input');
        }
    }

    public function kategoriDelete(Request $request)
    {
        $data = ProdukKategori::where('id', $request['id'])->first();
        $data->delete();
    }
}
