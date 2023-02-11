<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    @php
    use App\Models\Content;
    $content = Content::first();
    @endphp

    <title>{{ $content->nama }}</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('web/assets/logo/'. $content->logo) }}" rel="icon">
    <link href="{{ asset('web/assets/logo/'. $content->logo) }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('admin/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet') }}">
    <link href="{{ asset('admin/assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('admin/assets/css/style.css') }}" rel="stylesheet">

    {{-- Sweet Alert --}}
    <link href="{{ asset('admin/libs/sweetalert2/sweetalert2.css') }}" rel="stylesheet" type="text/css" />

    {{-- Select2 --}}
    <link href="{{ asset('admin/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
    
    @yield('style')
</head>

<body>
    @include('admin.layouts.header')

    @include('admin.layouts.sidebar')

    <main id="main" class="main">

      @yield('modal')

      @yield('header')

      @yield('content')

    </main>

    @include('admin.layouts.footer')

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

      

    <!-- Vendor JS Files -->
    <script src="{{ asset('admin/assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/quill/quill.min.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('admin/assets/js/main.js') }}"></script>

    {{-- jQuery --}}
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>

    {{-- SweetAlert --}}
    <script src="{{ asset('admin/libs/sweetalert2/sweetalert2.js') }}"></script>
    
    {{-- Select2 --}}
    <script src="{{ asset('admin/libs/select2/select2.min.js') }}"></script>


    @if (session()->has('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: '{{ session()->get('success') }}',
                showConfirmButton: false,
                timer: 1500,
                type: "success",
            })
        </script>
    @endif
    @if (session()->has('failed'))
        <script>
            Swal.fire({
              icon: 'error',
              title: '{{ session()->get('failed') }}',
              showConfirmButton: false,
              timer: 1500,
              type: "success",
            })
        </script>
    @endif

  <script>
    function hapus(ev) {
      ev.preventDefault();
      var tr_id = ev.currentTarget.getAttribute("data-id");
      var name = ev.currentTarget.getAttribute("data-name");
      var urlToRedirect = ev.currentTarget.getAttribute(
          'href'
      );
      Swal.fire({
          title: 'Apakah anda yakin ingin menghapus '+name+' ?',
          text: "Anda tidak akan bisa mengembalikannya",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Ya, Hapus!'
      })
      .then((result) => {
        if (result.hasOwnProperty('value') && result.value) {
        var request = $.ajax({
            url: urlToRedirect,
            type: "POST",
            data: {
                _token: '{{ csrf_token() }}',
                _method: 'POST',
                'id':tr_id,
            },
            dataType: "html"
        });
        request.done(function(response) {
            Swal.fire({
                icon: 'success',
                title: 'Data Berhasil Di Hapus',
                showConfirmButton: false,
                timer: 1500,
                type: "success",
            })
            // console.log(response)
            setTimeout(location.reload(), 2000);
        });

        request.fail(function(jqXHR, textStatus) {
            console.log(jqXHR);
            Swal.fire('Data gagal Di Hapus', '', 'error')
        });
        }
      })
    }

    
    $('.select2').select2();
  </script>

  @yield('script')

</body>

</html>