@extends('admin.layouts.app')

@section('header')
<div class="pagetitle">
    <h1>Layanan</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Layanan</a></li>
            <li class="breadcrumb-item active">Edit Layanan</li>
        </ol>
    </nav>
</div>
@endsection

@section('content')
<section class="section dashboard">
    <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
                <h5 class="card-title">Form Edit Layanan</h5>
                <form class="row g-3" action="{{ route("layanan.update") }}" method='POST' enctype='multipart/form-data'>
                    @csrf
                    <input type="hidden" name="id_layanan" value="{{ $layanan->id }}" readonly>
                    <div class="col-12">
                        <label for="" class="form-label">Judul Layanan</label>
                        <input type="text" class="form-control" name="judul" value="{{ $layanan->judul }}">
                    </div>
                    <div class="col-12">
                        <label for="" class="form-label">Deskripsi</label>
                        <input type="text" class="form-control" name="deskripsi" value="{{ $layanan->deskripsi }}">
                    </div>
                    <div class="col-12">
                        <label for="" class="form-label">Gambar</label>
                        <div class="row">
                            <input type="hidden" name="layanan_old" value="{{ $layanan->gambar }}" readonly>
                            <div class="col-md-2 d-flex justify-content-center">
                                <img src="{{ asset('web/assets/layanan/'. $layanan->gambar) }}" style="" class="img-fluid img-thumbnail" alt="" srcset="">    
                            </div>
                            <div class="col-md-10">
                                <input type="file" class="form-control col-lg-8" name="layanan_new">
                            </div>
                        </div>
                        {{-- <input type="file" class="form-control" name="gambar" value=""> --}}
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