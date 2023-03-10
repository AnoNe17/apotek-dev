@extends('admin.layouts.app')

@section('header')
<div class="pagetitle">
    <h1>Blog & Informasi Kesehatan</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Blog & Informasi Kesehatan</a></li>
            <li class="breadcrumb-item active">Kategori</li>
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
                <h5 class="card-title d-inline">Data Kategori Blog</h5>
                <a href="{{ route('blog.kategori.create') }}" class="btn btn-primary d-inline rounded-pill" style="float: right"><i class="bi bi-plus-square me-1"></i> &nbsp; Tambah Kategori</a>
              </div>


              <!-- Table with stripped rows -->
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                  @foreach ($kategori as $x => $value)
                      <tr>
                        <td>{{ $x+1 }}</td>
                        <td>{{ $value->nama }}</td>
                        <td>
                          <a href="{{ route('blog.kategori.edit', $value->id) }}" class='btn btn-warning d-inline rounded-pill'><i class="bi bi-pencil-square"></i></a>
                          <a href="{{ route('blog.kategori.delete') }}" class='btn btn-danger d-inline rounded-pill' data-name ="{{ $value->nama }}" data-id="{{ $value->id }}" onclick="hapus(event)"><i class="bi bi-trash3-fill"></i></a>
                          {{-- <form action="{{ route('blog.kategori.delete') }}" class="d-inline" method="post">
                            @csrf
                            <input type="hidden" name="id_kategori" value="{{ $k->id }}">
                            <button type="submit" class="btn btn-danger rounded-pill"><i class="bi bi-trash3-fill"></i></button>
                          </form> --}}
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