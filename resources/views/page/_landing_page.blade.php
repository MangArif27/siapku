<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">

  <title>Si Ratu Cilok</title>

  <!-- Bootstrap core CSS -->
  <link href="{{ asset('landingpage/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

  <!--

TemplateMo 570 Chain App Dev

https://templatemo.com/tm-570-chain-app-dev

-->

  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset('landingpage/assets/css/templatemo-chain-app-dev.css') }}">
  <link rel="stylesheet" href="{{ asset('landingpage/assets/css/animated.css ') }}">
  <link rel="stylesheet" href="{{ asset('landingpage/assets/css/owl.css ') }}">
  <style>
    .mySlides {
      display: none;
    }
  </style>
  <script src="https://code.highcharts.com/highcharts.js"></script>
  <script src="https://code.highcharts.com/modules/series-label.js"></script>
  <script src="https://code.highcharts.com/modules/exporting.js"></script>
  <script src="https://code.highcharts.com/modules/export-data.js"></script>
  <script src="https://code.highcharts.com/modules/accessibility.js"></script>
</head>
<!-- ***** Preloader Start ***** -->
<div id="js-preloader" class="js-preloader">
  <div class="preloader-inner">
    <span class="dot"></span>
    <div class="dots">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>
</div>
<!-- ***** Preloader End ***** -->

<!-- ***** Header Area Start ***** -->
<header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <nav class="main-nav">
          <!-- ***** Logo Start ***** -->
          <a href="#" class="logo">
            <img src="{{ asset('landingpage/assets/images/logo.png') }}" alt="Chain App Dev">
          </a>
          <!-- ***** Logo End ***** -->
          <!-- ***** Menu Start ***** -->
          <ul class="nav">
            <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
            <li class="scroll-to-section"><a href="#services">Fitur</a></li>
            <li class="scroll-to-section"><a href="#about">Info Rudep</a></li>
            <li class="scroll-to-section"><a href="#pricing">Kunjungan</a></li>
            <li class="scroll-to-section"><a href="#newsletter">Kontak</a></li>
            <li>
              <div class="gradient-button"><a href="login"><i class="fa fa-sign-in-alt"></i> Login</a></div>
            </li>
          </ul>
          <a class='menu-trigger'>
            <span>Menu</span>
          </a>
          <!-- ***** Menu End ***** -->
        </nav>
      </div>
    </div>
  </div>
</header>
<!-- ***** Header Area End ***** -->
<div class="main-banner mySlides section " id="top" data-wow-duration="1s" data-wow-delay="0.5s">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="row">
          <div class="col-lg-6 align-self-center">
            <div class="left-content show-up header-text wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1s">
              <div class="row">
                <div class="col-lg-12">
                  <h2>Ayo Segera Download Aplikasi SIRATU CILOK</h2>
                  <p>Sistem Informasi Rutan Kelas Satu Cilodong Depok merupakan sistem informasi pelayanan publik yang khusus digunakan pada Rutan Kelas I Depok guna mempermudah layanan masyarakat baik keluarga warga binaan pemasyarakatan/penasehat hukum dan pegawai Rutan Kelas I Depok dalam mengakses layanan publik yang diberikan oleh Rutan Kelas I Depok.</p>
                </div>
                <div class="col-lg-12">
                  <div class="white-button scroll-to-section">
                    <a href="#contact">Download In PlayStore <i class="fab fa-google-play"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="right-image wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
              <img src="{{ asset('landingpage/assets/images/slider-dec.png')}}" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div id="services" class="services mySlides section ">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="section-heading  wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.5s">
          <h4>Sistem Informasi <em>Rutan Kelas I Cilodong </em> Depok</h4>
          <img src="{{ asset('landingpage/assets/images/heading-line-dec.png')}}" alt="">
          <p>Sistem Informasi <em>Rutan Kelas Satu Cilodong Depok </em>merupakan sistem informasi pelayanan publik yang khusus digunakan pada <em>Rutan Kelas I Depok</em> guna mempermudah layanan masyarakat baik keluarga warga binaan pemasyarakatan/penasehat hukum dan pegawai <em>Rutan Kelas I Depok</em> dalam mengakses layanan publik yang diberikan oleh <em>Rutan Kelas I Depok</em>.</p>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-lg-3">
        <div class="service-item first-service">
          <div class="icon"></div>
          <h4>Layanan Kunjungan</h4>
          <p>Pada aplikasi ini anda bisa mendaftar kunjungan secara online dan datang sesuai dengan waktu yang telah anda tentukan</p>
        </div>
      </div>
      <div class="col-lg-3">
        <div class="service-item second-service">
          <div class="icon"></div>
          <h4>Layanan Tamu Dinas</h4>
          <p>Pada aplikasi ini anda sebagai tamu baik penasehat hukum atau dinas serta mahasiswa bisa membuat janji untuk bertamu ke Rutan Kelas I Depok</p>
        </div>
      </div>
      <div class="col-lg-3">
        <div class="service-item third-service">
          <div class="icon"></div>
          <h6>Layanan Kepegawaian, Keuangan dan Umum</h6>
          <p>Pada aplikasi ini juga tersedia layanan bagi pegawai dan urusan umu seperti slip gaji, inventory barang dan informasi penyerapan PAGU.</p>
        </div>
      </div>
      <div class="col-lg-3">
        <div class="service-item fourth-service">
          <div class="icon"></div>
          <h4>Layanan Informasi</h4>
          <p>Pada aplikasi ini juga tersedia informasi dan layanan pengaduan serta berita tentang layanan pada Rutan Kelas I Depok</p>
        </div>
      </div>
    </div>
  </div>
</div>
<div id="about" class="about-us mySlides section">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 align-self-center">
        <div class="section-heading">
          <h4>Rumah Tahanan Negara<em> Kelas I</em> Depok</h4>
          <img src="{{ asset('landingpage/assets/images/heading-line-dec.png')}}" alt="">
          <p>Rutan Kelas I Depok adalah suatu instansi pemerintahan yang bertugas untuk menyelenggarakan pelayanan tahanan yang berada di wilayah hukum Kota Depok, Rutan Kelas I Depok berada pada naungan Direktorat Jenderal Pemasyarakatan Kementerian Hukum dan Hak Asasi Manusia RI</p>
        </div>
        <div class="row">
          <div class="col-lg-6">
            <div class="box-item">
              <h4>Pegawai</h4>
              <h5>Maintance Problems</h5>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="box-item">
              <h4>Jumlah WBP</h4>
              <h5>Maintance Problems</h5>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="box-item">
              <h4>Pagu</h4>
              <h5>Maintance Problems</h5>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="box-item">
              <h4>Realisasi Pagu</h4>
              <h5>Maintance Problems</h5>
            </div>
          </div>
          <div class="col-lg-12">
            <div class="gradient-button">
              <a href="#">Download In PlayStore <i class="fab fa-google-play"></i></a>
            </div>
            <span>*Data pada tanggal 27 April 2023</span>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="right-image">
          <div id="container"></div>
        </div>
      </div>
    </div>
  </div>
</div>
<div id="pricing" class="pricing-tables mySlides section ">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 offset-lg-2">
        <div class="section-heading">
          <h4>Layanan Kunjungan <em>Rutan Kelas I Depok</em></h4>
          <img src="assets/images/heading-line-dec.png" alt="">
          <p>Layanan kunjungan merupakan salah satu layanan publik pada Rutan Kelas I Depok, data yang ditampilkan adalah jumlah pengunjung yang mendaftar secara online !</p>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="pricing-item-regular">
          <span class="price">15 Org</span>
          <h4>Kunjungan Hari Kemarin</h4>
          <div class="icon">
            <img src="{{ asset('landingpage/assets/images/pricing-table-01.png')}}" alt="">
          </div>
          <ul>
            <li>15 Laki-Laki</li>
            <li>216 Perempuan</li>
          </ul>
          <div class="border-button">
            <a href="#">Purchase This Plan Now</a>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="pricing-item-pro">
          <span class="price">20 Org</span>
          <h4>Kunjungan Hari Ini</h4>
          <div class="icon">
            <img src="{{ asset('landingpage/assets/images/pricing-table-01.png')}}" alt="">
          </div>
          <ul>
            <li>15 Laki-Laki</li>
            <li>216 Perempuan</li>
          </ul>
          <div class="border-button">
            <a href="#">Purchase This Plan Now</a>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="pricing-item-regular">
          <span class="price">10 Org</span>
          <h4>Kunjungan Hari Besok</h4>
          <div class="icon">
            <img src="{{ asset('landingpage/assets/images/pricing-table-01.png')}}" alt="">
          </div>
          <ul>
            <li>15 Laki-Laki</li>
            <li>216 Perempuan</li>
          </ul>
          <div class="border-button">
            <a href="#">Purchase This Plan Now</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<footer id="newsletter" class="mySlides section">
  <div class="container">
    <div class="col-lg-12">
      <div class="section-heading" style="text-align: center; -webkit-text-fill-color: white;">
        <h5>Kementerian Hukum dan Hak Asasi Manusia RI</h5>
        <h5>Kantor Wilayah Jawa Barat</h5>
        <h4>Rumah Tahanan Negara Kelas I Depok</h4>
        <br>Jl. M. Nasir, Cilodong, Kec. Cilodong, Kota Depok, Jawa Barat</br>
        Website : https://rutandepok.kemenkumham.go.id, Email : rutandepok@kemenkumham.go.id, Telp. (021) 849854 </p>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-4" style="-webkit-text-fill-color: white;">
        <h4>Kontak</h4>
        <p>Jl. M. Nasir, Cilodong, Kec. Cilodong, Kota Depok, Jawa Barat</p>
        <p><a href="#">(021) 8497845</a></p>
        <p><a href="#">rutandepok@kemenkumham.go.id</a></p>
      </div>
      <div class="col-lg-4" style="-webkit-text-fill-color: white;">
        <h4>Layanan Rutan Kelas I Depok</h4>
        <ul>
          <li><a href="#">Layanan Perawatan</a></li>
          <li><a href="#">Layanan Urusan Umum</a></li>
          <li><a href="#">Layanan Kepegawaian</a></li>
          <li><a href="#">Layanan Keamanan</a></li>
          <li><a href="#">Layanan Pembinaan</a></li>
        </ul>
      </div>
      <div class="col-lg-4">
        <div class="footer-widget">
          <h4>Tentang SiRatu Cilok</h4>
          <div class="logo">
            <img src="{{ asset('landingpage/assets/images/white-logo.png')}}" alt="">
          </div>
          <p>Sistem Informasi Rutan Kelas Satu Cilodong Depok merupakan sistem informasi pelayanan publik yang khusus digunakan pada Rutan Kelas I Depok</p>
        </div>
      </div>
      <div class="col-lg-12">
        <div class="copyright-text">
          <p>Copyright © 2023 Mitra Digital Persada & Rutan Kelas I Depok.</p>
        </div>
      </div>
    </div>
  </div>
</footer>


<!-- Scripts -->
<script src="{{ asset('landingpage/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('landingpage/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('landingpage/assets/js/owl-carousel.js') }}"></script>
<script src="{{ asset('landingpage/assets/js/animation.js') }}"></script>
<script src="{{ asset('landingpage/assets/js/imagesloaded.js') }}"></script>
<script src="{{ asset('landingpage/assets/js/popup.js') }}"></script>
<script src="{{ asset('landingpage/assets/js/custom.js') }}"></script>
<script>
  var myIndex = 0;
  carousel();

  function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
      x[i].style.display = "none";
    }
    myIndex++;
    if (myIndex > x.length) {
      myIndex = 1
    }
    x[myIndex - 1].style.display = "block";
    setTimeout(carousel, 20000); // Change image every 2 seconds
  }
</script>
<script>
  Highcharts.chart('container', {

    title: {
      text: 'Grafik Penyerapan Pagu Rutan Kelas I Depok',
      align: 'left'
    },

    subtitle: {
      text: 'Kantor Wilayah Kementerian Hukum dan HAM Jawa Barat',
      align: 'left'
    },

    yAxis: {
      title: {
        text: 'Persentase'
      }
    },

    xAxis: {
      categories: ['Januari', 'Februari', 'Maret']
    },

    series: [{
      name: 'Realisasi',
      data: [10, 19, 11]
    }, {
      name: 'Target',
      data: [24, 18, 20]
    }],

    responsive: {
      rules: [{
        condition: {
          maxWidth: 500
        },
        chartOptions: {
          legend: {
            layout: 'horizontal',
            align: 'center',
            verticalAlign: 'bottom'
          }
        }
      }]
    }

  });
</script>
</body>

</html>