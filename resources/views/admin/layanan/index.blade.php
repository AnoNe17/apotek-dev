@extends('admin.layouts.app')

@section('header')
<div class="pagetitle">
    <h1>Layanan</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">Layanan</a></li>
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
                <h5 class="card-title d-inline">Data Layanan</h5>
                <a href="{{ route('layanan.create') }}" class="btn btn-primary d-inline rounded-pill" style="float: right"><i class="bi bi-plus-square me-1"></i> &nbsp; Tambah Layanan</a>
              </div>

              <!-- Table with stripped rows -->
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                  
                <tbody>
                    @foreach ($layanan as $x => $value)
                        <tr>
                            <td>{{ $x+1 }}</td>
                            <td>
                                <img src="{{ asset('web/assets/layanan/'. $value->gambar) }}" class="" alt="" srcset="" style="width: 100px; height: 100px;"> 
                            </td>
                            <td>{{ $value->judul }}</td>
                            <td>{{ $value->deskripsi }}</td>
                            <td>
                                <a href="{{ route('layanan.edit', $value->id) }}" class='btn btn-warning d-inline rounded-pill'><i class="bi bi-pencil-square"></i></a>
                                <a href="{{ route('layanan.delete') }}" class='btn btn-danger d-inline rounded-pill' data-name ="{{ $value->judul }}" data-id="{{ $value->id }}" onclick="hapus(event)"><i class="bi bi-trash3-fill"></i></a>
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

@section('script')
  
@endsection