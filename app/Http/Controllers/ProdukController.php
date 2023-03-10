<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\ProdukFungsional;
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
            'nama' => 'required',
            'status' => 'required',
        ]);

        if ($validate->fails()) {
            return back()->with('failed', $validate->errors()->first());
        }

        $data                       = new ProdukKategori();
        $data->nama                 = $request['nama'];
        $data->status               = $request['status'];
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
            'status' => 'required',
        ]);

        if ($validate->fails()) {
            return back()->with('failed', $validate->errors()->first());
        }

        $data          = ProdukKategori::find($request['id_kategori']);
        $data->nama    = $request['nama'];
        $data->status  = $request['status'];
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


    public function fungsional()
    {
        $fungsional = ProdukFungsional::get();
        return view('admin.produk.fungsional', [
            'fungsional' => $fungsional
        ]);
    }

    public function fungsionalCreate()
    {
        $kategori = ProdukKategori::where('status', 1)->get();
        return view('admin.produk.fungsionalCreate', [
            'kategori' => $kategori
        ]);
    }

    public function fungsionalStore(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'nama' => 'required',
            'kategori_id' => 'required',
        ]);

        if ($validate->fails()) {
            return back()->with('failed', $validate->errors()->first());
        }

        $data                       = new ProdukFungsional();
        $data->nama                 = $request['nama'];
        $data->produk_kategori_id   = $request['kategori_id'];
        $data->save();

        if ($data->save()) {
            return redirect()->route('produk.fungsional')->with('success', 'Data Berhasil Di Input');
        } else {
            return back()->with('failed', 'Data Gagal Di Input');
        }
    }

    public function fungsionalEdit($id)
    {
        $fungsional = ProdukFungsional::where('id', $id)->first();
        $kategori = ProdukKategori::where('status', 1)->get();

        return view('admin.produk.fungsionalEdit', [
            'fungsional' => $fungsional,
            'kategori' => $kategori
        ]);
    }

    public function fungsionalUpdate(Request $request)
    {
        // return $request['id_fungsional'];
        $validate = Validator::make($request->all(), [
            'nama' => 'required',
            'kategori_id' => 'required',
        ]);

        if ($validate->fails()) {
            return back()->with('failed', $validate->errors()->first());
        }

        $data               = ProdukFungsional::find($request['id_fungsional']);
        $data->nama         = $request['nama'];
        $data->produk_kategori_id  = $request['kategori_id'];
        $data->save();

        if ($data->save()) {
            return redirect()->route('produk.fungsional')->with('success', 'Data Berhasil Di Input');
        } else {
            return back()->with('failed', 'Data Gagal Di Input');
        }
    }

    public function fungsionalDelete(Request $request)
    {
        $data = ProdukFungsional::where('id', $request['id'])->first();
        $data->delete();
    }

    public function produk()
    {
        $produk = Produk::get();
        return view('admin.produk.produk', [
            'produk' => $produk
        ]);
    }

    public function produkCreate()
    {
        $kategori = ProdukKategori::get();
        return view('admin.produk.produkCreate', [
            'kategori' => $kategori
        ]);
    }

    public function produkStore(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'kategori_id' => 'required',
            'nama' => 'required',
            'gambar' => 'required',
        ]);

        if ($validate->fails()) {
            return back()->with('failed', $validate->errors()->first());
        }

        $ext_doc = $request->gambar->extension();
        if ($ext_doc == 'jpeg' || $ext_doc == 'png' || $ext_doc == 'jpg') {
            $docName = rand() . '.' . $ext_doc;
            $request->gambar->move(public_path('web/assets/produk/'), $docName);
        } else {
            return back()->with('failed', 'Wrong image format');
        }

        $data                           = new Produk();
        $data->produk_kategori_id       = $request['kategori_id'];
        $data->produk_fungsional_id     = $request['fungsional_id'];
        $data->nama                     = $request['nama'];
        $data->gambar                   = $docName;

        if ($data->save()) {
            return redirect()->route('produk')->with('success', 'Data Berhasil Di Input');
        } else {
            return back()->with('failed', 'Data Gagal Di Input');
        }
    }

    public function produkCard(Request $request)
    {
        $kategori = ProdukKategori::where('id', $request['kategori_id'])->first();
        if ($kategori->status !== 0) {
            $fungsional = ProdukFungsional::where('produk_kategori_id', $request['kategori_id'])->get();
            return view('admin.produk.card', [
                'fungsional' => $fungsional,
            ]);
        }
    }
}
