@extends('admin.layouts.app')

@section('header')
<div class="pagetitle">
    <h1>Layanan</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Layanan</a></li>
            <li class="breadcrumb-item active">Tambah Layanan</li>
        </ol>
    </nav>
</div>
@endsection

@section('content')
<section class="section dashboard">
    <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
                <h5 class="card-title">Form Tambah Layanan</h5>
                <form class="row g-3" action="{{ route("layanan.store") }}" method='POST' enctype='multipart/form-data'>
                    @csrf
                    <div class="col-12">
                        <label for="" class="form-label">Judul Layanan</label>
                        <input type="text" class="form-control" name="judul" value="">
                    </div>
                    <div class="col-12">
                        <label for="" class="form-label">Deskripsi</label>
                        <input type="text" class="form-control" name="deskripsi" value="">
                    </div>
                    <div class="col-12">
                        <label for="" class="form-label">Gambar</label>
                        <input type="file" class="form-control" name="gambar" value="">
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