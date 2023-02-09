@extends('admin.layouts.app')

@section('header')
<div class="pagetitle">
    <h1>Produk</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Produk</a></li>
            <li class="breadcrumb-item ">Kategori</li>
            <li class="breadcrumb-item active">Tambah Kategori</li>
        </ol>
    </nav>
</div>
@endsection

@section('content')
<section class="section dashboard">
    <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
                <h5 class="card-title">Form Tambah Kategori Produk</h5>
                <form class="row g-3" action="{{ route("produk.kategori.store") }}" method='POST' enctype='multipart/form-data'>
                    @csrf
                    <div class="col-12">
                        <label for="" class="form-label">Nama Kategori</label>
                        <input type="text" class="form-control" name="nama" value="">
                    </div>
                    <div class="col-12">
                        <label for="" class="form-label">Apakah Kategori ini memiliki Fungsional ?</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="gridRadios1" value="1" checked="">
                            <label class="form-check-label" for="gridRadios1">
                                Ya
                            </label>
                            
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="gridRadios2" value="0">
                            <label class="form-check-label" for="gridRadios2">
                                Tidak
                            </label>
                        </div>
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