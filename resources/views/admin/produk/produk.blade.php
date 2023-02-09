@extends('admin.layouts.app')

@section('header')
<div class="pagetitle">
    <h1>Produk</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Produk</a></li>
            <li class="breadcrumb-item active">Data Produk</li>
        </ol>
    </nav>
</div>
@endsection

@section('content')
<section class="section dashboard">
    <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <div class="col-lg-12 mt-4 mb-4">
                <h5 class="card-title d-inline">Data Produk</h5>
                <a href="{{ route('produk.create') }}" class="btn btn-primary d-inline rounded-pill" style="float: right"><i class="bi bi-plus-square me-1"></i> &nbsp; Tambah Produk</a>
              </div>

              <!-- Table with stripped rows -->
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Fungsional</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                  @foreach ($produk as $x => $value)
                      <tr>
                        <td>{{ $x+1 }}</td>
                        <td>#</td>
                        <td>#</td>
                        <td></td>
                        <td></td>
                        <td>
                          <a href="{{ route('produk.fungsional.edit', $value->id) }}" class='btn btn-warning d-inline rounded-pill'><i class="bi bi-pencil-square"></i></a>
                          <a href="{{ route('produk.fungsional.delete') }}" class='btn btn-danger d-inline rounded-pill' data-name ="{{ $value->nama }}" data-id="{{ $value->id }}" onclick="hapus(event)"><i class="bi bi-trash3-fill"></i></a>
                        </td>
                      </tr>
                  @endforeach
                <tbody>
                    
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
        </div>
    </div>
</section>
@endsection

@section('script')
  
@endsection