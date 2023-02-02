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
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#misi1" type="button" role="tab" aria-controls="home" aria-selected="true">Misi 1</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#misi2" type="button" role="tab" aria-controls="profile" aria-selected="false">Misi 2</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#misi3" type="button" role="tab" aria-controls="contact" aria-selected="false">Misi 3</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#misi4" type="button" role="tab" aria-controls="contact" aria-selected="false">Misi 4</button>
                            </li>
                        </ul>
                        <div class="tab-content pt-2" id="borderedTabContent">
                            <div class="tab-pane fade show active" id="misi1" role="tabpanel" aria-labelledby="home-tab">
                                <label for="" class="form-label">Misi 1</label>
                                <input type="text" class="form-control" id="" name="misi1">
                            </div>
                            <div class="tab-pane fade" id="misi2" role="tabpanel" aria-labelledby="profile-tab">
                                <label for="" class="form-label">Misi 2</label>
                                <input type="text" class="form-control" id="" name="misi2">
                            </div>
                            <div class="tab-pane fade" id="misi3" role="tabpanel" aria-labelledby="contact-tab">
                                <label for="" class="form-label">Misi 3</label>
                                <input type="text" class="form-control" id="" name="misi3">
                            </div>
                            <div class="tab-pane fade" id="misi4" role="tabpanel" aria-labelledby="contact-tab">
                                <label for="" class="form-label">Misi 4</label>
                                <input type="text" class="form-control" id="" name="misi4">
                            </div>
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
                        <input type="text" class="form-control" id="" name="alamat" value="{{ $content->alamat }}">
                    </div>
                    <div class="col-12">
                        <!-- Layanan Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered" id="borderedTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#layanan1" type="button" role="tab" aria-controls="home" aria-selected="true">Layanan 1</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#layanan2" type="button" role="tab" aria-controls="profile" aria-selected="false">Layanan 2</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#layanan3" type="button" role="tab" aria-controls="contact" aria-selected="false">Layanan 3</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#layanan4" type="button" role="tab" aria-controls="contact" aria-selected="false">Layanan 4</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#layanan5" type="button" role="tab" aria-controls="contact" aria-selected="false">Layanan 5</button>
                            </li>
                        </ul>
                        <div class="tab-content pt-2" id="borderedTabContent">
                            <div class="tab-pane fade show active" id="layanan1" role="tabpanel" aria-labelledby="home-tab">
                                <label for="" class="form-label">Layanan 1</label>
                                <input type="text" class="form-control" id="" name="layanan1">
                            </div>
                            <div class="tab-pane fade" id="layanan2" role="tabpanel" aria-labelledby="profile-tab">
                                <label for="" class="form-label">Layanan 2</label>
                                <input type="text" class="form-control" id="" name="layanan2">
                            </div>
                            <div class="tab-pane fade" id="layanan3" role="tabpanel" aria-labelledby="contact-tab">
                                <label for="" class="form-label">Layanan 3</label>
                                <input type="text" class="form-control" id="" name="layanan3">
                            </div>
                            <div class="tab-pane fade" id="layanan4" role="tabpanel" aria-labelledby="contact-tab">
                                <label for="" class="form-label">Layanan 4</label>
                                <input type="text" class="form-control" id="" name="layanan4">
                            </div>
                            <div class="tab-pane fade" id="layanan5" role="tabpanel" aria-labelledby="contact-tab">
                                <label for="" class="form-label">Layanan 5</label>
                                <input type="text" class="form-control" id="" name="layanan5">
                            </div>
                        </div><!-- End Bordered Tabs -->                    
                    </div>
                    <div class="col-12">
                        {{-- Clients Tab --}}
                        <ul class="nav nav-tabs nav-tabs-bordered" id="borderedTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#client1" type="button" role="tab" aria-controls="home" aria-selected="true">Client 1</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#client2" type="button" role="tab" aria-controls="profile" aria-selected="false">Client 2</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#client3" type="button" role="tab" aria-controls="contact" aria-selected="false">Client 3</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#client4" type="button" role="tab" aria-controls="contact" aria-selected="false">Client 4</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#client5" type="button" role="tab" aria-controls="contact" aria-selected="false">Client 5</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#client6" type="button" role="tab" aria-controls="contact" aria-selected="false">Client 6</button>
                            </li>
                        </ul>
                        <div class="tab-content pt-2" id="borderedTabContent">
                            <div class="tab-pane fade show active" id="client1" role="tabpanel" aria-labelledby="home-tab">
                                <label for="" class="form-label">Client 1</label>
                                <input type="text" class="form-control" id="" name="client1">
                            </div>
                            <div class="tab-pane fade" id="client2" role="tabpanel" aria-labelledby="profile-tab">
                                <label for="" class="form-label">Client 2</label>
                                <input type="text" class="form-control" id="" name="client2">
                            </div>
                            <div class="tab-pane fade" id="client3" role="tabpanel" aria-labelledby="contact-tab"> 
                                <label for="" class="form-label">Client 3</label>
                                <input type="text" class="form-control" id="" name="client3">
                            </div>
                            <div class="tab-pane fade" id="client4" role="tabpanel" aria-labelledby="contact-tab">
                                <label for="" class="form-label">Client 4</label>
                                <input type="text" class="form-control" id="" name="client4">
                            </div>
                            <div class="tab-pane fade" id="client5" role="tabpanel" aria-labelledby="contact-tab">
                                <label for="" class="form-label">Client 5</label>
                                <input type="text" class="form-control" id="" name="client5">
                            </div>
                            <div class="tab-pane fade" id="client6" role="tabpanel" aria-labelledby="contact-tab">
                                <label for="" class="form-label">Client 6</label>
                                <input type="text" class="form-control" id="" name="client6">
                            </div>
                        </div><!-- End Bordered Tabs -->
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