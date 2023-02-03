@extends('admin.layouts.app')

@section('header')
<div class="pagetitle">
    <h1>Pengaturan</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Pengaturan</a></li>
            <li class="breadcrumb-item active">Pengrutan Website</li>
        </ol>
    </nav>
</div>
@endsection


@section('content')
<section class="section dashboard">
    <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
                <h5 class="card-title">Form Pengaturan Website</h5>
                <form class="row g-3" action="{{ route("setting.web.update") }}" method='POST' enctype='multipart/form-data'>
                    @csrf
                    <div class="col-12">
                        <label for="" class="form-label">Nama</label>
                        <input type="text" class="form-control" name="nama" value="{{ $content->nama }}">
                    </div>
                    <div class="col-12">
                        <label for="" class="form-label">Slogan</label>
                        <input type="text" class="form-control" id="" name="slogan" value="{{ $content->slogan }}">
                    </div>
                    <div class="col-12">
                        <label for="" class="form-label">Visi</label>
                        <input type="text" class="form-control" id="" name="visi" value="{{ $content->visi }}">
                    </div>
                    <div class="col-12">
                        <!-- Misi Tabs -->
                        
                        <ul class="nav nav-tabs nav-tabs-bordered" id="borderedTab" role="tablist">
                            @foreach ($misi as $x => $m)
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link @if ($x === 0) active @else @endif " id="home-tab" data-bs-toggle="tab" data-bs-target="#misi{{ $x }}" type="button" role="tab" aria-controls="home" aria-selected="true">Misi {{ $x+1 }}</button>
                                </li>
                            @endforeach
                        </ul>
                        <div class="tab-content pt-2" id="borderedTabContent">
                            @foreach ($misi as $x => $m)
                                <input type="hidden" name="id_misi[]" value="{{ $m->id }}">
                                <div class="tab-pane fade @if ($x === 0) show active @else @endif " id="misi{{ $x }}" role="tabpanel" aria-labelledby="home-tab">
                                    <label for="" class="form-label">Judul Misi {{ $x+1 }}</label>
                                    <input type="text" class="form-control" id="" name="misi[]" value="{{ $m->nama }}">
                                </div>
                            @endforeach
                        </div><!-- End Bordered Tabs -->
                    </div>
                    <div class="col-12">
                        <label for="inputEmail4" class="form-label">Telepon</label>
                        <input type="text" class="form-control" id="" name="telp" value="{{ $content->telp }}">
                    </div>
                    <div class="col-12">
                        <label for="inputEmail4" class="form-label">Email</label>
                        <input type="text" class="form-control" id="" name="email" value="{{ $content->email }}">
                    </div>
                    <div class="col-12">
                        <label for="inputEmail4" class="form-label">Hari Awal</label>
                        <input type="text" class="form-control" id="" name="hari_awal" value="{{ $content->hari_awal }}">
                    </div>
                    <div class="col-12">
                        <label for="" class="form-label">Hari Akhir</label>
                        <input type="text" class="form-control" id="" name="hari_akhir" value="{{ $content->hari_akhir }}">
                    </div>
                    <div class="col-12">
                        <label for="" class="form-label">Jam Awal</label>
                        <input type="text" class="form-control" id="" name="jam_awal" value="{{ $content->jam_awal }}">
                    </div>
                    <div class="col-12">
                        <label for="" class="form-label">Jam Akhir</label>
                        <input type="text" class="form-control" id="" name="jam_akhir" value="{{ $content->jam_akhir }}">
                    </div>
                    <div class="col-12">
                        <label for="" class="form-label">Maps</label>
                        <input type="text" class="form-control" id="" name="maps" value="{{ $content->maps }}">
                    </div>
                    <div class="col-12">
                        <label for="" class="form-label">Provinsi</label>
                        <input type="text" class="form-control" id="" name="provinsi" value="{{ $content->provinsi }}">
                    </div>
                    <div class="col-12">
                        <label for="" class="form-label">Kota</label>
                        <input type="text" class="form-control" id="" name="kota" value="{{ $content->kota }}">
                    </div>
                    <div class="col-12">
                        <label for="" class="form-label">Kecamatan</label>
                        <input type="text" class="form-control" id="" name="kecamatan" value="{{ $content->kecamatan }}">
                    </div>
                    <div class="col-12">
                        <label for="" class="form-label">Kode Pos</label>
                        <input type="text" class="form-control" id="" name="kode_pos" value="{{ $content->kode_pos }}">
                    </div>
                    <div class="col-12">
                        <label for="" class="form-label">Detail Alamat</label>
                        <input type="text" class="form-control" id="" name="detail_alamat" value="{{ $content->detail_alamat }}">
                    </div>
                    <div class="col-12">
                        <!-- Layanan Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered" id="borderedTab" role="tablist">
                            @foreach ($layanan as $x => $l)
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link @if ($x === 0) active @else @endif" id="home-tab" data-bs-toggle="tab" data-bs-target="#layanan{{ $x }}" type="button" role="tab" aria-controls="home" aria-selected="true">Layanan {{ $x+1 }}</button>
                                </li>
                            @endforeach
                        </ul>
                        <div class="tab-content pt-2" id="borderedTabContent">
                            @foreach ($layanan as $x => $l)
                            <input type="hidden" name="id_layanan[]" value="{{ $l->id }}">
                                <div class="tab-pane fade @if ($x === 0) show active @else @endif" id="layanan{{ $x }}" role="tabpanel" aria-labelledby="home-tab">
                                    <div class="col-12 mb-3">
                                        <label for="" class="form-label">Judul Layanan {{ $x+1 }}</label>
                                        <input type="text" class="form-control" id="" name="judul_layanan[]" value="{{ $l->judul }}">
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label for="" class="form-label">Deskripsi Layanan {{ $x+1 }}</label>
                                        <input type="text" class="form-control" id="" name="deskripsi_layanan[]" value="{{ $l->deskripsi }}">
                                    </div>
                                </div>
                            @endforeach
                        </div>                   
                    </div>
                    {{-- <div class="col-12">
                        <ul class="nav nav-tabs nav-tabs-bordered" id="borderedTab" role="tablist">
                            @foreach ($client as $x => $c)
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link @if ($x === 0) active @else @endif" id="home-tab" data-bs-toggle="tab" data-bs-target="#client{{ $x }}" type="button" role="tab" aria-controls="home" aria-selected="true">Client {{ $x+1 }}</button>
                                </li>
                            @endforeach
                        </ul>
                        <div class="tab-content pt-2" id="borderedTabContent">
                            @foreach ($client as $x => $c)
                                <div class="tab-pane fade @if ($x === 0) show active @else @endif " id="client{{ $x }}" role="tabpanel" aria-labelledby="home-tab">
                                    <label for="" class="form-label">Client {{ $x+1 }}</label>
                                    <input type="text" class="form-control" id="" name="client{{ $x }}">
                                </div>
                            @endforeach
                        </div>
                    </div> --}}
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