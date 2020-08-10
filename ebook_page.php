<!DOCTYPE html>
<html lang="it">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Easybook - Index</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  
  <!-- Verifico che l'utente sia loggato al sistema -->
    <?php 
      session_start(); 
      if (isset($_GET['logout'])) {
          session_destroy();
          unset($_SESSION['username']);
          header("location: index.php");
      }
    ?>
  <!-- =======================================================
  * Template Name: Groovin - v2.1.0
  * Template URL: https://bootstrapmade.com/groovin-free-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo mr-auto"><a href="index.php">Easybook</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.php" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li>
            <div id="barraRicerca">
                <form class="form-inline" action="cerca.php" style="margin-bottom: -50px;">
                    <input id="id_search" class="form-control mr-sm-2" type="text" name="ebook" placeholder="Cerca..."/>
                    <button class="btn_search" name = "ebook_search" type="submit"></button>
                </form>
            </div>
          </li>
          <li class="active"><a href="index.php">Home</a></li>
          <li class="drop-down"><a href="">Genere</a>
            <ul>
                <li><a href="#">Autobiografico</a></li>
                <li><a href="#">Avventura</a></li>
                <li><a href="#">Azione</a></li>
                <li><a href="#">Biografico</a></li>
                <li><a href="#">Fantascientifico</a></li>
                <li><a href="#">Fantasy</a></li>
                <li><a href="#">Giallo</a></li>
                <li><a href="#">Investigativo</a></li>
                <li><a href="#">Horror</a></li>
            </ul>
          </li>
            <li id="Topnav_1" class="drop-down">
                <a class ="Topnav_1" style="margin-top: 0px" href=""><label>Benvenuto/a, <strong><?php echo $_SESSION['name']; ?></strong><label>
                  <ul>
                      <a href="up_ebook.php">Carica il tuo ebook</a>
                      <a href="acquisti.php">I tuoi acquisti</a>
                      <a href="index.php?logout='1'">Esci</a>
                  </ul>
                </a>
           </li>
   
          <li><a id="sign" class="sign" style=" color: #5c9f24;" href="signin.php">Registrati</a></li>
          <li><a id="log" class="log" style="color: #5c9f24;" href="login.php">Accedi</a></li>  
         
        </ul>
      </nav><!-- .nav-menu -->
      
      <a href="#services" class="get-started-btn scrollto">Catalogo</a>

    </div>
  </header><!-- End Header -->

    <main id="main">
       <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container">

      <div class="col-md-12" >
        <div class="col-md-6">
          <div class="pro-img-details">
            <img id="copertina_ebook" src="assets/ebook/<?php
                  $title = $_GET['title'];
                  $db = mysqli_connect('localhost', 'root', '', 'easybooks_db');
                  $query = "SELECT * FROM ebooks WHERE title='$title'";
                  $results = mysqli_query($db, $query);
                  if (mysqli_num_rows($results) > 0) 
                    while($row = $results->fetch_assoc())
                      echo $row['copertina'];
              ?>"/>
          </div>
        </div>    
      </div>
      <div class="col-md-6" id="dettagli">
        <h2 id="titleEbook" class="pro-title">
          <?php
            $title = $_GET['title'];
            echo $title;
          ?>
        </h2>
        <h5 class="pro-author">
            di <label id="author"><?php
            $author = $_GET['author'];
            echo $author;
          ?></label>
        </h5>
        <span class="posted_in"> 
          <strong>Genere: </strong><?php
            $genre = $_GET['genre'];
            echo $genre;
          ?>
        </span>
        <span class="posted_year"> 
          <strong>Anno di pubblicazione: </strong></br><?php
            $year = $_GET['year'];  
            echo $year;
          ?>
        </span>
        <span class="pro-price">
          <strong>Prezzo: </strong> <label id="price" style="color: #444444;"> <?php
            $price = $_GET['price'];  
            echo $price;
          ?>
          €</label>
        </span>
        <span>
          <a href="payment.php?title=<?php echo $_GET['title']?>&price=<?php echo $_GET['price']?>"><label id="payment">Acquista</label></a>       
        </span>
        <p>
          <form method="GET" action="ebook_page.php">
            <button id="read" class="get-started-btn_read scrollto" style="display:none;" name="read" onclick="readOnline()" type="button">Leggi Online</button>
            <button id="download" class="get-started-btn_read scrollto" style="display:none;" name="download" onclick="downloadEbook()" type="button"><a>Download</a> </button>               
          </form>
        </p>
         
      </div>
      <div class="col-md-9" id="didascalia" style="margin-top: -350px; margin-left: 47px;">       
          <h3> DESCRIZIONE</h3>
            <p id="description">
              <?php
                  $title = $_GET['title'];
                  $db = mysqli_connect('localhost', 'root', '', 'easybooks_db');
                  $query = "SELECT * FROM ebooks WHERE title='$title'";
                  $results = mysqli_query($db, $query);
                  if (mysqli_num_rows($results) > 0) 
                    while($row = $results->fetch_assoc())
                      echo $row['description'];
              ?>
            </p>
          </div> 
      </div>
    </section>
    <!-- End Services Section -->
    </main>
  <!-- End #main -->

 <!-- ======= Footer ======= -->
 <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="footer-info">
              <h3>EASYBOOK</h3>
              <p>
                <strong>Email:</strong> easybook@nonesiste.com<br>
              </p>
              <div class="social-links mt-3">
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="index.php">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Clarissa Carbonaro</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/groovin-free-bootstrap-theme/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End Footer -->
    
    <div id="preloader"></div>
  </div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>

  <!-- Script JS -->
  <script src="assets/js/main.js"></script>
  <script src="assets/js/script.js"></script>
  <script src="assets/js/pdfobject.min.js"></script>
  <script>

  </script>
  <?php include('assets/php/checkLog_1.php') ?>
  <?php include('assets/php/checkPrice.php') ?>
  
</body>

</html>