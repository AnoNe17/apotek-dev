<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'produk';
    protected $primaryKey = 'id';

    public function Kategori()
    {
        return $this->belongsTo(ProdukKategori::class, 'produk_kategori_id', 'id')->withDefault();
    }

    public function Fungsional()
    {
        return $this->belongsTo(ProdukFungsional::class, 'produk_fungsional_id', 'id')->withDefault();
    }
}
