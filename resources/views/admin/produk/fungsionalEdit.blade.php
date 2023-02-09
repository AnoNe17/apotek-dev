@extends('admin.layouts.app')

@section('header')
<div class="pagetitle">
    <h1>Produk</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Produk</a></li>
            <li class="breadcrumb-item ">Fungsional</li>
            <li class="breadcrumb-item active">Edit Fungsional</li>
        </ol>
    </nav>
</div>
@endsection

@section('content')
<section class="section dashboard">
    <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
                <h5 class="card-title">Form Edit Fungsional</h5>
                <form class="row g-3" action="{{ route("produk.fungsional.update") }}" method='POST' enctype='multipart/form-data'>
                    @csrf
                    <input type="hidden" name="id_fungsional" value="{{ $fungsional->id }}" readonly>
                    <div class="col-12">
                        <label for="" class="form-label">Kategori</label>
                        <select name="kategori_id" class="form-control select2" data-placeholder="--- Pilih Kategori Produk ---">
                            <option></option>
                            @foreach ($kategori as $k)
                                <option value="{{ $k->id }}" {{$k->id === $fungsional->produk_kategori_id  ? 'selected' : ''}}>{{ $k->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12">
                        <label for="" class="form-label">Nama Fungsional</label>
                        <input type="text" class="form-control" name="nama" value="{{ $fungsional->nama }}">
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