@extends('admin.layouts.app')

@section('header')
<div class="pagetitle">
    <h1>Produk</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Produk</a></li>
            <li class="breadcrumb-item ">Data Produk</li>
            <li class="breadcrumb-item active">Tambah Data Produk</li>
        </ol>
    </nav>
</div>
@endsection

@section('content')
<section class="section dashboard">
    <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
                <h5 class="card-title">Form Tambah Data Produk</h5>
                <form class="row g-3" action="{{ route("produk.store") }}" method='POST' enctype='multipart/form-data'>
                    @csrf
                    <div class="col-12">
                        <label for="" class="form-label">Kategori</label>
                        <select id="kategori_id" name="kategori_id" class="form-control select2" data-placeholder="--- Pilih Kategori Produk ---">
                            <option></option>
                            @foreach ($kategori as $k)
                                <option value="{{ $k->id }}">{{ $k->nama }}</option>
                            @endforeach
                        </select>

                        <div id="fungsional" style="display: none">
                        
                        </div>
                    </div>
                    <div id="form" style="display: none">
                        <div class="col-12">
                            <label for="" class="form-label">Nama Produk</label>
                            <input type="text" class="form-control" name="nama" value="">
                        </div>
                        <div class="col-12 mt-3">
                            <label for="" class="form-label">Gambar</label>
                            <input type="file" class="form-control" name="gambar" value="">
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
        $('#kategori_id').change(function () {
            var $kategori_id = $('#kategori_id').val();
            if ($kategori_id != '') {
                var request = $.ajax({
                    url: "{{ route('produk.card') }}",
                    type: "POST",
                    data: {
                        _token: '{{ csrf_token() }}',
                        _method: 'POST',
                        kategori_id: $kategori_id
                    },
                    dataType: "html"
                });

                request.done(function(response) {
                    $('#fungsional').css('display', 'block');
                    $('#fungsional').html(response);
                    $('#form').css('display', 'block');
                    // console.log(response);
                });

                request.fail(function(jqXHR, textStatus) {
                    console.log(jqXHR);
                    Swal.fire('Data failed ', '', 'error')
                });
            }
        })

    </script>
@endsection