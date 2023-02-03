@extends('admin.layouts.app')

@section('header')
<div class="pagetitle">
    <h1>Blog & Informasi Kesehatan</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Blog & Informasi Kesehatan</a></li>
            <li class="breadcrumb-item ">Kategori</li>
            <li class="breadcrumb-item active">Edit Kategori</li>
        </ol>
    </nav>
</div>
@endsection

@section('content')
<section class="section dashboard">
    <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
                <h5 class="card-title">Form Edit Kategori Blog</h5>
                <form class="row g-3" action="{{ route("blog.kategori.update") }}" method='POST' enctype='multipart/form-data'>
                    @csrf
                    <input type="hidden" name="id_kategori" value="{{ $kategori->id }}">
                    <div class="col-12">
                        <label for="" class="form-label">Nama Kategori</label>
                        <input type="text" class="form-control" name="nama" value="{{ $kategori->nama }}">
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