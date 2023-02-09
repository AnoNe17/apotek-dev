<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProdukFungsional extends Model
{
    protected $table = 'produk_fungsional';
    protected $primaryKey = 'id';

    public function Kategori()
    {
        return $this->belongsTo(ProdukKategori::class, 'produk_kategori_id', 'id')->withDefault();
    }
}
