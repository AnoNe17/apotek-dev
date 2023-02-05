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

@section('modal')
<div class="modal fade" id="misiModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Tambah Misi</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form class="row g-3" action="{{ route("setting.web.misi.store") }}" method='POST' enctype='multipart/form-data'>
                @csrf
                <div class="col-12">
                    <label for="" class="form-label">Judul Misi</label>
                    <input type="text" class="form-control" name="judul" value="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
        </div>
    </div>
</div>

<div class="modal fade" id="mitraModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Tambah Mitra</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form class="row g-3" action="{{ route("setting.web.mitra.store") }}" method='POST' enctype='multipart/form-data'>
                @csrf
                <div class="col-12">
                    <label for="" class="form-label">Logo Mitra</label>
                    <input type="file" class="form-control" name="source" value="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
        </div>
    </div>
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
                        <label for="" class="form-label">Logo</label>
                        <div class="row">
                            <input type="hidden" name="logo_old" value="{{ $content->logo }}" readonly>
                            <div class="col-md-2 d-flex justify-content-center">
                                <img src="{{ asset('web/assets/logo/'. $content->logo) }}" class="img-fluid img-thumbnail" alt="" srcset="">    
                            </div>
                            <div class="col-md-10">
                                <input type="file" class="form-control col-lg-8" id="" name="logo_new">
                            </div>
                        </div>
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
                                    <button class="nav-link d-inline @if ($x === 0) active @else @endif " id="home-tab" data-bs-toggle="tab" data-bs-target="#misi{{ $x }}" type="button" role="tab" aria-controls="home" aria-selected="true">
                                        Misi {{ $x+1 }} &nbsp;
                                        <a href="{{ route('setting.web.misi.delete') }}" class='text-danger' data-name ="{{ $m->nama }}" data-id="{{ $m->id }}" onclick="hapus(event)"><i class="bi bi-x-circle"></i></a>
                                    </button>
                                </li>
                            @endforeach
                            <li class="nav-item" role="presentation">
                                <button class="nav-link text-primary" type="button" role="tab" aria-controls="home" aria-selected="true" data-bs-toggle="modal" data-bs-target="#misiModal"><i class="bi bi-plus-square"></i></button>
                            </li>
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
                        <label for="" class="form-label">Facebook</label>
                        <input type="text" class="form-control" id="" name="facebook" value="{{ $content->facebook }}">
                    </div>
                    <div class="col-12">
                        <label for="" class="form-label">Instagram</label>
                        <input type="text" class="form-control" id="" name="instagram" value="{{ $content->instagram }}">
                    </div>
                    <div class="col-12">
                        <label for="" class="form-label">Youtube</label>
                        <input type="text" class="form-control" id="" name="youtube" value="{{ $content->youtube }}">
                    </div>
                    <div class="col-12">
                        <label for="" class="form-label">Tokopedia</label>
                        <input type="text" class="form-control" id="" name="tokopedia" value="{{ $content->tokopedia }}">
                    </div>
                    {{-- <div class="col-12">
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
                    </div> --}}
                    {{-- Mitra --}}
                    <div class="col-12">
                        <ul class="nav nav-tabs nav-tabs-bordered" id="borderedTab" role="tablist">
                            @foreach ($client as $x => $c)
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link @if ($x === 0) active @else @endif" id="home-tab" data-bs-toggle="tab" data-bs-target="#client{{ $x }}" type="button" role="tab" aria-controls="home" aria-selected="true">
                                        Mitra {{ $x+1 }} &nbsp;
                                        <a href="{{ route('setting.web.mitra.delete') }}" class='text-danger' data-name ="Gambar Mitra {{ $x+1 }}" data-id="{{ $c->id }}" onclick="hapus(event)"><i class="bi bi-x-circle"></i></a>
                                    </button>
                                </li>
                            @endforeach
                            <li class="nav-item" role="presentation">
                                <button class="nav-link " type="button" role="tab" aria-controls="home" aria-selected="true" data-bs-toggle="modal" data-bs-target="#mitraModal"><i class="bi bi-plus-square"></i></button>
                            </li>
                        </ul>
                        <div class="tab-content pt-2" id="borderedTabContent">
                            @foreach ($client as $x => $c)
                                <div class="tab-pane fade @if ($x === 0) show active @else @endif " id="client{{ $x }}" role="tabpanel" aria-labelledby="home-tab">
                                    <label for="" class="form-label">Logo Mitra {{ $x+1 }}</label>
                                    <div class="row">
                                        <input type="hidden" name="mitra_old[]" value="{{ $c->source }}" readonly>
                                        <div class="col-md-2 d-flex justify-content-center">
                                            <img src="{{ asset('web/assets/mitra/'. $c->source) }}" style="" class="img-fluid img-thumbnail" alt="" srcset="">    
                                        </div>
                                        <div class="col-md-10">
                                            <input type="file" class="form-control col-lg-8" name="mitra_new[]">
                                        </div>
                                    </div>
                                </div>
                            @endforeach
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

@section('script')

    <script>
        function asd(ev) {
            alert('asd');
        }
    </script>
    
@endsection