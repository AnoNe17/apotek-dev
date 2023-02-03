<?php

namespace App\Http\Controllers;

use App\Models\Content;

class BlogController extends Controller
{
    public function index()
    {
        $content = Content::first();
        return view('admin.blog.blog', [
            'content' => $content
        ]);
    }

    public function kategori()
    {
        return view('admin.blog.kategori');
    }

    public function kategoriCreate()
    {
        $content = Content::first();
        return view('admin.blog.kategoriCreate', [
            'content' => $content
        ]);
    }
}
