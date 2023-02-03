@extends('admin.layouts.app')

@section('header')
<div class="pagetitle">
    <h1>Blog & Informasi Kesehatan</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Blog & Informasi Kesehatan</a></li>
            <li class="breadcrumb-item active">Postingan</li>
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
                <h5 class="card-title d-inline">Data Postingan</h5>
                <a href="{{ route('blog.postingan.create') }}" class="btn btn-primary d-inline rounded-pill" style="float: right"><i class="bi bi-plus-square me-1"></i> &nbsp; Tambah Postingan</a>
              </div>

              <!-- Table with stripped rows -->
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($postingan as $x => $value)
                      <tr>
                        <td>{{ $x+1 }}</td>
                        <td>{{ $value->judul }}</td>
                        <td>{{ $value->Kategori->nama }}</td>
                        <td>
                          <a href="{{ route('blog.kategori.edit', $value->id) }}" class='btn btn-warning d-inline rounded-pill'><i class="bi bi-pencil-square"></i></a>
                          <a href="{{ route('blog.postingan.delete') }}" class='btn btn-danger d-inline rounded-pill' data-name ="{{ $value->judul }}" data-id="{{ $value->id }}" onclick="hapus(event)"><i class="bi bi-trash3-fill"></i></a>
                        </td>
                      </tr>
                    @endforeach
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
        </div>
    </div>
</section>
@endsection