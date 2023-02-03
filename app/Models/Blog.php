<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'blog';
    protected $primaryKey = 'id';

    public function Kategori()
    {
        return $this->belongsTo(BlogKategori::class, 'blog_kategori_id', 'id')->withDefault();
    }
}
