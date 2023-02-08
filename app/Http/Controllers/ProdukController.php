<?php

namespace App\Http\Controllers;

use App\Models\ProdukKategori;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function kategori()
    {
        $kategori = ProdukKategori::get();
        return view('admin.produk.kategori', [
            'kategori' => $kategori
        ]);
    }
}
