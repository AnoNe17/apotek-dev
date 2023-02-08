@extends('admin.layouts.app')

@section('header')
<div class="pagetitle">
    <h1>Kritik & Saran</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">Kritik & Saran</a></li>
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
                <h5 class="card-title d-inline">Data Kritik & Saran</h5>
                {{-- <a href="{{ route('blog.kategori.create') }}" class="btn btn-primary d-inline rounded-pill" style="float: right"><i class="bi bi-plus-square me-1"></i> &nbsp; Tambah Kategori</a> --}}
              </div>


              <!-- Table with stripped rows -->
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">Dibuat Pada</th>
                    <th scope="col">Lihat</th>
                  </tr>
                </thead>
                  @foreach ($saran as $x => $value)
                      <tr>
                        <td>{{ $x+1 }}</td>
                        <td>{{ $value->nama }}</td>
                        <td>{{ $value->email }}</td>
                        {{-- <td>{{ $value->saran }}</td> --}}
                        <td>{{ $value->tanggal }}</td>
                        <td>
                            <button type="button" class="btn btn-primary d-inline rounded-pill" data-bs-toggle="modal" data-bs-target="#modal{{ $x }}">
                                <i class="bi bi-eye-fill"></i>
                            </button>
                            <div class="modal fade" id="modal{{ $x }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Detail Kritik & Saran</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form class="row g-3" action="{{ route("setting.web.update") }}" method='POST' enctype='multipart/form-data'>
                                            <div class="col-12">
                                                <label for="" class="form-label">Nama</label>
                                                <input type="text" class="form-control" id="" name="youtube" value="{{ $value->nama }}" disabled>
                                            </div>
                                            <div class="col-12">
                                                <label for="" class="form-label">Dibuat Pada</label>
                                                <input type="text" class="form-control" id="" name="youtube" value="{{ $value->tanggal }}" disabled>
                                            </div>
                                            <div class="col-12">
                                                <label for="" class="form-label">Pesan</label>
                                                <textarea class="form-control" name="" id="" disabled>{{ $value->saran }}</textarea>
                                                {{-- <input type="text" class="form-control" id="" name="youtube" value="{{ $value->tanggal }}"> --}}
                                            </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
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