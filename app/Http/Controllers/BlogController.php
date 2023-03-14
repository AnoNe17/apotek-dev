<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogKategori;
use App\Models\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use function GuzzleHttp\json_encode;

class BlogController extends Controller
{
    public function postingan()
    {
        $postingan = Blog::get();
        return view('admin.blog.postingan', [
            'postingan' => $postingan
        ]);
    }

    public function postinganCreate()
    {
        $kategori = BlogKategori::get();

        return view('admin.blog.postinganCreate', [
            'kategori' => $kategori
        ]);
    }

    public function postinganStore(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'judul' => 'required',
            'kategori_id' => 'required',
            'isi' => 'required',
            'gambar' => 'required',
        ]);

        if ($validate->fails()) {
            return back()->with('failed', $validate->errors()->first());
        }

        $ext_doc = $request->gambar->extension();
        if ($ext_doc == 'jpeg' || $ext_doc == 'png' || $ext_doc == 'jpg') {
            $docName = rand() . '.' . $ext_doc;
            $request->gambar->move(public_path('web/assets/blog/'), $docName);
        } else {
            return back()->with('failed', 'Wrong image format');
        }

        $data                       = new Blog();
        $data->judul                = $request['judul'];
        $data->blog_kategori_id     = $request['kategori_id'];
        $data->isi                  = $request['isi'];
        $data->gambar               = $docName;
        $data->save();

        if ($data->save()) {
            return redirect()->route('blog.postingan')->with('success', 'Data Berhasil Di Input');
        } else {
            return back()->with('failed', 'Data Gagal Di Input');
        }
    }

    public function postinganDelete(Request $request)
    {
        $data = Blog::where('id', $request['id'])->first();
        $data->delete();
    }

    public function kategori()
    {
        $kategori = BlogKategori::get();

        return view('admin.blog.kategori', [
            'kategori' => $kategori
        ]);
    }

    public function kategoriCreate()
    {
        return view('admin.blog.kategoriCreate');
    }

    public function kategoriStore(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'nama' => 'required',
        ]);

        if ($validate->fails()) {
            return back()->with('failed', $validate->errors()->first());
        }

        $data          = new BlogKategori();
        $data->nama    = $request['nama'];
        $data->save();

        if ($data->save()) {
            return redirect()->route('blog.kategori')->with('success', 'Data Berhasil Di Input');
        } else {
            return back()->with('failed', 'Data Gagal Di Input');
        }
    }

    public function kategoriEdit($id)
    {
        $kategori = BlogKategori::where('id', $id)->first();
        return view('admin.blog.kategoriEdit', [
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

        $data          = BlogKategori::find($request['id_kategori']);
        $data->nama    = $request['nama'];
        $data->save();

        if ($data->save()) {
            return redirect()->route('blog.kategori')->with('success', 'Data Berhasil Di Input');
        } else {
            return back()->with('failed', 'Data Gagal Di Input');
        }
    }

    public function kategoriDelete(Request $request)
    {
        $data = BlogKategori::where('id', $request['id'])->first();
        $data->delete();
    }
}
