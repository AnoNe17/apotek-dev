<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>{{ $content->nama }}</title>
  <meta content="" name="description">

  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('web/assets/logo/'. $content->logo) }}" rel="icon">
  <link href="{{ asset('web/assets/logo/'. $content->logo) }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('page/assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('page/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('page/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('page/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('page/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('page/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('page/assets/css/style.css') }}" rel="stylesheet">

  {{-- Sweet Alert --}}
    <link href="{{ asset('admin/libs/sweetalert2/sweetalert2.css') }}" rel="stylesheet" type="text/css" />
</head>

<body style="">

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="{{ route('home') }}" class="logo d-flex align-items-center">
        <img src="{{ asset('web/assets/logo/'. $content->logo) }}" alt="">
        <span>{{ $content->nama }}</span>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#mitra">Mitra</a></li>
          <li class="dropdown"><a class="nav-link scrollto" href="#profil"><span>Profil</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a class="nav-link scrollto" href="#visi">Visi</a></li>
              <li><a class="nav-link scrollto" href="#misi">Misi</a></li>
            </ul>
          </li>
          {{-- <li><a class="nav-link scrollto" href="#profil">Profil</a></li> --}}
          <li><a class="nav-link scrollto" href="#layanan">Layanan</a></li>
          <li><a class="nav-link scrollto" href="#product">Produk</a></li>
          <li><a class="nav-link scrollto" href="#info">Info Kesehatan</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center">
          <h1 data-aos="fade-up">{{ $content->nama }}</h1>
          <h2 data-aos="fade-up" data-aos-delay="400">{{ $content->slogan }}</h2>
          <div data-aos="fade-up" data-aos-delay="600">
            <div class="text-center text-lg-start">
              <a href="#mitra" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                <span>Get Started</span>
                <i class="bi bi-arrow-right"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
          <img src="{{ asset('page/assets/img/hero.jpeg') }}" class="img-fluid" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <!-- ======= Clients Section ======= -->
    <section id="mitra" class="clients">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h2>Mitra</h2>
          <p>Mitra kami</p>
        </header>

        <div class="clients-slider swiper">
          <div class="swiper-wrapper align-items-center">
            @foreach ($client as $c)
              <div class="swiper-slide"><img src="{{ asset('web/assets/mitra/'. $c->source) }}" class="img-fluid" alt=""></div>
            @endforeach
          </div>
          <div class="swiper-pagination"></div>
        </div>
      </div>

    </section><!-- End Clients Section -->

  <main id="main">

  

    <!-- ======= Profil Section ======= -->

    <div class="profil" id="profil">
      <section id="visi" class="features">
        <div class="container" data-aos="fade-up">

          <header class="section-header">
            <h2>Profil</h2>
            <p>VISI</p>
          </header>
          
          <!-- Feature Tabs -->
          <div class="row" >
            <div class="col-lg-6 d-flex align-items-center mb-1" data-aos="zoom-out">
              <h3 class="align-middle m-3 mb-5" style="color: #012970; font-style: italic">"{{ $content->visi }}"</h3>
            </div>
            <div class="col-lg-6" data-aos="fade-up">
              <img src="{{ asset('page/assets/img/fitur.jpeg') }}" class="img-fluid animated" alt="" >
            </div>

          </div><!-- End Feature Tabs -->


        </div>
      </section>
    
      <section id="misi" class="features">
        <div class="container" data-aos="fade-up">
          <header class="section-header">
            <h2>Profil</h2>
            <p>MISI</p>
          </header>
          <div class="row">

            <div class="col-lg-6">
              <img src="{{ asset('page/assets/img/fitur2.jpeg') }}" class="img-fluid" alt="">
            </div>

            <div class="col-lg-6 mt-5 mt-lg-0 d-flex">
              <div class="row align-self-center gy-4">

                @foreach ($misi as $m)
                    <div class="col-md-6" data-aos="zoom-out" data-aos-delay="300">
                      <div class="feature-box d-flex align-items-center">
                        <i class="bi bi-check"></i>
                        <h3>{{ $m->nama }}</h3>
                      </div>
                    </div>
                @endforeach

              </div>
            </div>

          </div> <!-- / row -->

        </div>
      </section>
    </div>

    <!-- Feature Icons -->
    <section id="layanan" class="values">
      <div class="container" data-aos="fade-up">
        <header class="section-header">
          <h2>Layanan</h2>
          <p>Layanan Kami</p>
        </header>

        {{-- <div class="clients-slider swiper">
          <div class="swiper-wrapper align-items-center">
            @foreach ($client as $c)
              <div class="swiper-slide"><img src="{{ asset('web/assets/mitra/'. $c->source) }}" class="img-fluid" alt=""></div>
            @endforeach
          </div>
          <div class="swiper-pagination"></div>
        </div> --}}

        <div class="row">

          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
            <div class="box">
              <img src="{{ asset('page/assets/img/values-1.png') }}" class="img-fluid" alt="">
              <h3>Konseling Apoteker</h3>
              <p>Praktik Jam Konseling dan Pelayanan Farmasi Klinik oleh Apoteker</p>
            </div>
          </div>

          <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="400">
            <div class="box">
              <img src="{{ asset('page/assets/img/values-2.png') }}" class="img-fluid" alt="">
              <h3>Happy Family</h3>
              <p>Melayani komunitas dengan baik dan memberikan kegiatan yang positif serta edukatif kepada komunitas lanjut usia yang mayoritas sudah tidak bekerja</p>
            </div>
          </div>

          <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="600">
            <div class="box">
              <img src="{{ asset('page/assets/img/values-3.png') }}" class="img-fluid" alt="">
              <h3>Pemeriksaan Klinik</h3>
              <p>Pemeriksaan Tekanan darah, Kolesterol, Asam urat  & Gula Darah</p>
            </div>
          </div>

        </div>

      </div>

    </section><!-- End Values Section -->
        

    
    

    <!-- End Profil Section -->


    

    <!-- ======= Portfolio Section ======= -->
    <section id="product" class="portfolio">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h2>Produk</h2>
          <p>Produk Kami</p>
        </header>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter-app">App</li>
              <li data-filter=".filter-card">Card</li>
              <li data-filter=".filter-web">Web</li>
            </ul>
          </div>
        </div>

        <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="{{ asset('page/assets/img/portfolio/portfolio-1.jpg') }}" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>App 1</h4>
                <p>App</p>
                <div class="portfolio-links">
                  <a href="{{ asset('page/assets/img/portfolio/portfolio-1.jpg') }}" data-gallery="portfolioGallery" class="portfokio-lightbox" title="App 1"><i class="bi bi-plus"></i></a>
                  <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <div class="portfolio-wrap">
              <img src="{{ asset('page/assets/img/portfolio/portfolio-2.jpg') }}" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Web 3</h4>
                <p>Web</p>
                <div class="portfolio-links">
                  <a href="{{ asset('page/assets/img/portfolio/portfolio-2.jpg') }}" data-gallery="portfolioGallery" class="portfokio-lightbox" title="Web 3"><i class="bi bi-plus"></i></a>
                  <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="{{ asset('page/assets/img/portfolio/portfolio-3.jpg') }}" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>App 2</h4>
                <p>App</p>
                <div class="portfolio-links">
                  <a href="{{ asset('page/assets/img/portfolio/portfolio-3.jpg') }}" data-gallery="portfolioGallery" class="portfokio-lightbox" title="App 2"><i class="bi bi-plus"></i></a>
                  <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div class="portfolio-wrap">
              <img src="{{ asset('page/assets/img/portfolio/portfolio-4.jpg') }}" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Card 2</h4>
                <p>Card</p>
                <div class="portfolio-links">
                  <a href="{{ asset('page/assets/img/portfolio/portfolio-4.jpg') }}" data-gallery="portfolioGallery" class="portfokio-lightbox" title="Card 2"><i class="bi bi-plus"></i></a>
                  <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <div class="portfolio-wrap">
              <img src="{{ asset('page/assets/img/portfolio/portfolio-5.jpg') }}" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Web 2</h4>
                <p>Web</p>
                <div class="portfolio-links">
                  <a href="{{ asset('page/assets/img/portfolio/portfolio-5.jpg') }}" data-gallery="portfolioGallery" class="portfokio-lightbox" title="Web 2"><i class="bi bi-plus"></i></a>
                  <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="{{ asset('page/assets/img/portfolio/portfolio-6.jpg') }}" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>App 3</h4>
                <p>App</p>
                <div class="portfolio-links">
                  <a href="{{ asset('page/assets/img/portfolio/portfolio-6.jpg') }}" data-gallery="portfolioGallery" class="portfokio-lightbox" title="App 3"><i class="bi bi-plus"></i></a>
                  <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div class="portfolio-wrap">
              <img src="{{ asset('page/assets/img/portfolio/portfolio-7.jpg') }}" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Card 1</h4>
                <p>Card</p>
                <div class="portfolio-links">
                  <a href="{{ asset('page/assets/img/portfolio/portfolio-7.jpg') }}" data-gallery="portfolioGallery" class="portfokio-lightbox" title="Card 1"><i class="bi bi-plus"></i></a>
                  <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div class="portfolio-wrap">
              <img src="{{ asset('page/assets/img/portfolio/portfolio-8.jpg') }}" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Card 3</h4>
                <p>Card</p>
                <div class="portfolio-links">
                  <a href="{{ asset('page/assets/img/portfolio/portfolio-8.jpg') }}" data-gallery="portfolioGallery" class="portfokio-lightbox" title="Card 3"><i class="bi bi-plus"></i></a>
                  <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <div class="portfolio-wrap">
              <img src="{{ asset('page/assets/img/portfolio/portfolio-9.jpg') }}" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Web 3</h4>
                <p>Web</p>
                <div class="portfolio-links">
                  <a href="{{ asset('page/assets/img/portfolio/portfolio-9.jpg') }}" data-gallery="portfolioGallery" class="portfokio-lightbox" title="Web 3"><i class="bi bi-plus"></i></a>
                  <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>

    </section><!-- End Portfolio Section -->


    

    <!-- ======= Recent Blog Posts Section ======= -->
    <section id="info" class="recent-blog-posts">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h2>Info</h2>
          <p>Info kesehatan</p>
        </header>

        <div class="row">

          <div class="col-lg-4">
            <div class="post-box">
              <div class="post-img"><img src="{{ asset('page/assets/img/blog/blog-1.jpg') }}" class="img-fluid" alt=""></div>
              <span class="post-date">Tue, September 15</span>
              <h3 class="post-title">Eum ad dolor et. Autem aut fugiat debitis voluptatem consequuntur sit</h3>
              <a href="blog-single.html" class="readmore stretched-link mt-auto"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="post-box">
              <div class="post-img"><img src="{{ asset('page/assets/img/blog/blog-2.jpg') }}" class="img-fluid" alt=""></div>
              <span class="post-date">Fri, August 28</span>
              <h3 class="post-title">Et repellendus molestiae qui est sed omnis voluptates magnam</h3>
              <a href="blog-single.html" class="readmore stretched-link mt-auto"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="post-box">
              <div class="post-img"><img src="{{ asset('page/assets/img/blog/blog-3.jpg') }}" class="img-fluid" alt=""></div>
              <span class="post-date">Mon, July 11</span>
              <h3 class="post-title">Quia assumenda est et veritatis aut quae</h3>
              <a href="blog-single.html" class="readmore stretched-link mt-auto"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
            </div>
          </div>

        </div>

      </div>

    </section><!-- End Recent Blog Posts Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h2>Contact</h2>
          <p>Contact Us</p>
        </header>

        <div class="row gy-4">

          <div class="col-lg-6">

            <div class="row gy-4">
              <div class="col-md-6">
                <div class="info-box">
                  <i class="bi bi-geo-alt"></i>
                  <h3>Alamat</h3>
                  <p>{{ $content->detail_alamat }} <br>
                      {{ $content->kecamatan }}, {{ $content->kota }} {{ $content->kode_pos }}<br>
                      {{ $content->provinsi }}</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box">
                  <i class="bi bi-telephone"></i>
                  <h3>Telepon</h3>
                  <p>{{ $content->telp }}</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box">
                  <i class="bi bi-envelope"></i>
                  <h3>Email</h3>
                  <p>{{ $content->email }}<br></p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box">
                  <i class="bi bi-clock"></i>
                  <h3>Jam Operasional</h3>
                  <p>{{ $content->hari_awal }} - {{ $content->hari_akhir }}<br>{{ $content->jam_awal }} - {{ $content->jam_akhir }}</p>
                </div>
              </div>
            </div>

          </div>

          <div class="col-lg-6 ">
            <h3 class="text-center" style="color: #4154f1; font-weight: 650">Kritik & Saran</h3>
            <form action="{{ route("saran.store") }}" method="post" class="p-3" >
              @csrf
              <div class="row gy-4">
                <div class="col-md-6">
                  <input type="text" name="name" class="form-control" placeholder="Nama" required>
                </div>

                <div class="col-md-6 ">
                  <input type="email" class="form-control" name="email" placeholder="Email" required>
                </div>
                <div class="col-md-12">
                  <textarea class="form-control" name="pesan" rows="6" placeholder="Pesan" required></textarea>
                </div>

                <div class="col-md-12 text-center">
                  <button type="submit" class="btn btn-primary">Send Message</button>
                </div>

              </div>
            </form>

          </div>

        </div>

      </div>

    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    <div data-aos="zoom-out" class="footer-newsletter">
      {!! $content->maps !!}
    </div>

    <div class="footer-top">
      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-5 col-md-12 footer-info">
            <a href="{{ route('home') }}" class="logo d-flex align-items-center">
              <img src="{{ asset('web/assets/logo/'. $content->logo) }}" alt="">
              <span>{{ $content->nama }}</span>
            </a>
            <p>{{ $content->slogan }}</p>
            <div class="social-links mt-3">
              <a href="{{ $content->facebook }}" class="facebok"><i class="bi bi-facebook"></i></a>
              <a href="{{ $content->instagram }}" class="instagram"><i class="bi bi-instagram"></i></a>
              <a href="{{ $content->youtube }}" class="youtube"><i class="bi bi-youtube"></i></a>
              <a href="{{ $content->tokopedia }}" class=""><i class="bi bi-cart4"></i></a>
            </div>
          </div>

          <div class="col-lg-2 col-6 footer-links">
            <h4>Menu</h4>
            <ul>
              <li><i class="bi bi-chevron-right"></i> <a class="scrollto" href="#hero">Home</a></li>
              <li><i class="bi bi-chevron-right"></i> <a class="scrollto" href="#clients">Clients</a></li>
              <li><i class="bi bi-chevron-right"></i> <a class="scrollto" href="#profil">Profil</a></li>
              <li><i class="bi bi-chevron-right"></i> <a class="scrollto" href="#layanan">Layanan</a></li>
              <li><i class="bi bi-chevron-right"></i> <a class="scrollto" href="#product">Produk</a></li>
              <li><i class="bi bi-chevron-right"></i> <a class="scrollto" href="#blog">Blog</a></li>
              <li><i class="bi bi-chevron-right"></i> <a class="scrollto" href="#contact">Contact</a></li>
            </ul>
          </div>

          <div class="col-lg-2 col-6 footer-links">
            <h4>Layanan</h4>
            <ul>
              @foreach ($layanan as $l)
                <li><i class="bi bi-chevron-right"></i> <a href="#">{{ $l->judul }}</a></li>
              @endforeach
            </ul>
          </div>

          <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
            <h4>Contact Us</h4>
            <p>
              {{ $content->detail_alamat }} <br>
              {{ $content->kecamatan }}, {{ $content->kota }} {{ $content->kode_pos }}<br>
              {{ $content->provinsi }} <br><br>
              <strong>Phone:</strong> {{ $content->telp }}<br>
              <strong>Email:</strong> {{ $content->email }}<br>
            </p>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        2022 Copyrights reserved by <strong><span>{{ $content->nama }}</span></strong>. 
        {{-- &copy; Copyright <strong><span>FlexStart</span></strong>. All Rights Reserved --}}
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/flexstart-bootstrap-startup-template/ -->
        Created by <a href="https://www.instagram.com/_17maulana/">LaNa_Dev</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('page/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
  <script src="{{ asset('page/assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('page/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('page/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('page/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('page/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('page/assets/vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('page/assets/js/main.js') }}"></script>

  {{-- SweetAlert --}}
  <script src="{{ asset('admin/libs/sweetalert2/sweetalert2.js') }}"></script>


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

</body>

  
</html>