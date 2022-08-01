<?php
    // Create database connection using config file
require("config.php");
 
// Fetch all users data from database
// $result = mysqli_query($mysqli, "SELECT * FROM `admin` ORDER BY id DESC");

if (isset($_POST['btnsubmit'])) {
        $namaWisata = $_POST ['namaWisata'];
        $provinsi = $_POST ['provinsi'];
        $kabupaten = $_POST ['kabupaten'];
    $alamat = $_POST ['alamat'];
    $keterangan = $_POST ['keterangan'];
    $gambar = $_POST ['gambar'];
    $latitude = $_POST ['latitude'];
    $longtitude = $_POST ['longtitude'];
    $tahun = $_POST ['tahun'];
    $jumlah = $_POST ['jumlah'];
    $sql = "INSERT INTO `wisata` (`nama_wisata`, `provinsi`, `kabupaten`, `alamat`, `keterangan`, `gambar`, `latitude`, `longtitude`, `tahun`, `jumlah_pengunjung`) VALUES ('$namaWisata', '$provinsi', '$kabupaten', '$alamat', '$keterangan', '$gambar', '$latitude', '$longtitude', '$tahun', '$jumlah')";

    if ($mysqli->query($sql) === true) {
        echo "data masuk";
    } else {
        echo "error: $mysqli -> error";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Mentor Bootstrap Template - Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Mentor - v4.7.0
  * Template URL: https://bootstrapmade.com/mentor-free-education-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="index.php">Mentor</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.php" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="active" href="index.php">Home</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <?php
       if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM `wisata` WHERE id = $id";
        $result = $mysqli->query($sql);
        if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {

           echo "
         <section id='hero' class='d-flex justify-content-center align-items-center' style='background-image: url(admin/".$row['gambar'].")'>
           <div class='container position-relative' data-aos='zoom-in' data-aos-delay='100'>
             <h1>".$row['nama_wisata']."</h1>
             <h2>".$row['provinsi']."</h2>
           </div>
         </section>
        

  <main id='main'>

    <!-- ======= Counts Section ======= -->
    <section id='counts' class='counts section-bg'>
      <div class='container'>

        <div class='row counters'>

        <div class='col-lg-12 row justify-content-center'>
        
          <div class='col-lg-3 col-6 text-center'>
            <span data-purecounter-start='0' data-purecounter-end='".$row['jumlah_pengunjung']."' data-purecounter-duration='1' class='purecounter'></span>
            <p>Turis</p>
          </div>

        </div>

        </div>

      </div>
    </section>

    <!-- ======= Why Us Section ======= -->
    <section id='why-us' class='why-us'>
      <div class='container' data-aos='fade-up'>

        <div class='row'>
          <div class='col-lg-8 d-flex align-items-stretch'>
            <div class='content'>
              <h3>".$row['nama_wisata']."</h3>
              <p>
              ".$row['keterangan']."
              </p>
            </div>
          </div>
          <div class='col-lg-4 d-flex align-items-stretch' data-aos='zoom-in' data-aos-delay='100'>
            <div class='icon-boxes d-flex flex-column justify-content-center'>
              <div class='row'>

                <div class='col-xl-12 d-flex align-items-stretch'>
                  <div class='icon-box mt-4 mt-xl-0'>
                    <i class='bx bx-receipt'></i>
                    <h4>Alamat</h4>
                    <p>".$row['alamat']."</p>
                  </div>
                </div>
                
                <div class='col-xl-12 d-flex align-items-stretch mt-4'>
                  <div class='icon-box mt-4 mt-xl-0'>
                    <i class='bx bx-images'></i>
                    <h4>MAP</h4>

                    <label for=''>Longitude :</label>
                  <p>".$row['longtitude']."</p>

                  <label for=''>Latitude</label>
                  <p>".$row['latitude']."</p>
                  </div>
                </div>
              </div>
            </div><!-- End .content-->
          </div>
        </div>";
      }
            } else {
                echo "error: $mysqli -> error";
            }
        }
        ?>

      </div>
    </section><!-- End Why Us Section -->

        </div>

      </div>
    </section><!-- End Trainers Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>Pariwisata</h3>
            <p>
              A108 Adam Street <br>
              New York, NY 535022<br>
              United States <br><br>
              <strong>Phone:</strong> +1 5589 55488 55<br>
              <strong>Email:</strong> info@example.com<br>
            </p>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Pulau Sumatera</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Pulau Kalimantan</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Pulau Jawa</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Pulau Nusa Tengara & Bali</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Pulau Sulawesi</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Pulau Maluku & Papua</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Join Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div>

        </div>
      </div>
    </div>

    <div class="container d-md-flex py-4">
      
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>