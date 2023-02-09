@extends('admin.layouts.app')

@section('header')
<div class="pagetitle">
    <h1>Blog & Informasi Kesehatan</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Blog & Informasi Kesehatan</a></li>
            <li class="breadcrumb-item ">Postingan</li>
            <li class="breadcrumb-item active">Tambah Postingan</li>
        </ol>
    </nav>
</div>
@endsection

@section('content')
<section class="section dashboard">
    <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
                <h5 class="card-title">Form Tambah Postingan</h5>
                <form class="row g-3" action="{{ route("blog.postingan.store") }}" method='POST' enctype='multipart/form-data'>
                    @csrf
                    <div class="col-12">
                        <label for="" class="form-label">Judul</label>
                        <input type="text" class="form-control" name="judul" value="">
                    </div>
                    <div class="col-12">
                        <label for="" class="form-label">Kategori</label>
                        <select name="kategori_id" class="form-control select2" data-placeholder="--- Pilih Kategori Postingan ---">
                            <option></option>
                            @foreach ($kategori as $k)
                                <option value="{{ $k->id }}">{{ $k->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12">
                        <label for="" class="form-label">Isi</label>
                        <textarea type="text" class="form-control" name="isi" value=""></textarea>
                    </div>
                    <div class="col-12">
                        <label for="" class="form-label">Gambar</label>
                        <input type="text" class="form-control" name="gambar" value="">
                    </div>
                    
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection