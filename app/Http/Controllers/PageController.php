<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Content;
use App\Models\Layanan;
use App\Models\Misi;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $client = Client::get();
        $content = Content::first();
        $layanan = Layanan::get();
        $misi = Misi::get();

        // return $content;

        return view('page.index', [
            'client' => $client,
            'content' => $content,
            'layanan' => $layanan,
            'misi' => $misi,
        ]);
    }
}
