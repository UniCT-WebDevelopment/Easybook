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

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container">
      <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">

        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

          <!-- Slide 1 -->
          <div class="carousel-item active">
          <div class="carousel-background"><img  id="slide-1" src="assets/img/slide/slide-1.jpg" alt=""></div>
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated animate__fadeInDown">Tutti gli ebook che vuoi con un solo click</h2>
                <p class="animate__animated animate__fadeInUp">Se vuoi creare o leggere ebook sei nel posto giusto.</br>
                    Effettua l'accesso per avere a dispozione tutti i servizi della piattaforma.
                    Scegli tra innumerevoli titoli.</p>
                <div>
                  <a href="#services" class="btn-get-started animate__animated animate__fadeInUp scrollto">Visualizza catalogo</a>
                </div>
              </div>
            </div>
          </div>

          <!-- Slide 2 -->
          <div class="carousel-item">
          <div class="carousel-background"><img id="slide-2" src="assets/img/slide/slide-2.jpg" alt=""></div>
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated animate__fadeInDown">Scegli il genere che preferisci</h2>
                <p class="animate__animated animate__fadeInUp">Su Easybook trovi qualunque genere di cui tu abbia voglia.
                  Devi solo scegliere quello che preferisci.
                </p>
                <div>
                  <a href="#services" class="btn-get-started animate__animated animate__fadeInUp scrollto">Visualizza catalogo</a>
                </div>
              </div>
            </div>
          </div>

          <!-- Slide 3 -->
          <div class="carousel-item">
            <div class="carousel-background"><img id="slide-3" src="assets/img/slide/slide-3.jpg" alt=""></div>
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated animate__fadeInDown">Fai conoscere i tuoi ebook</h2>
                <p class="animate__animated animate__fadeInUp">Registrandoti puoi mettere a disposizione di altri utenti
                  gli ebook scritti da te e puoi usufruire del download.</p>
                <div>
                  <a href="#services" class="btn-get-started animate__animated animate__fadeInUp scrollto">Visualizza catalogo</a>
                </div>
              </div>
            </div>
          </div>

        </div>

        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon icofont-simple-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>

        <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon icofont-simple-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>

      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container">

        <div class="section-title">
          <h2>Catalogo Ebook</h2>
          <p>Scopri tutti gli ebook del nostro Catalogo sui libri da scaricare o leggi online il tuo eBook (PDF).</p>
        </div>

        <div id="catalog_ebook" class="row flow-offset-1">
        <?php
      $db = mysqli_connect('localhost', 'root', '', 'easybooks_db');
          $query = "SELECT * FROM ebooks";
          $results = mysqli_query($db, $query);
          $i = 0;
          if (mysqli_num_rows($results) > 0) {
            echo' <!-- ======= Services Section ======= -->
                <section id="services" class="services">
                  <div class="container">
                    <div id="catalog_ebook" class="row flow-offset-1">';
                    while($row = $results->fetch_assoc()){
                      $orgDate = $row['date'];
                      $newDate = date("d/m/Y", strtotime($orgDate));
                      echo'
                        <div class="col-xs-6 col-md-4">
                        <a href="ebook_page.php?title='.$row['title'].'&author='.$row['author'].'&genre='.$row['genre'].'&year='.$newDate.'&price='.$row['price'].'">
                          <div class="product"><img id="img_products" style="resize: both;" src="assets/ebook/'.$row['copertina'].'" alt="">
                            <div class="caption">
                            <h6>'.$row['title'].'</h6>
                            </a>
                              <span>
                                <pre class="author">'.$row['author'].'</pre>
                                <pre class="genre">'.$row['genre'].'</pre>
                                <pre id="price'.$i.'" class="price sale">'.$row['price'].'€</pre>
                                <pre class="year">'.$newDate.'</pre>
                              </span>
                            </div>
                          </div>
                        </div>
                        <script>
                        if('.$row['price'].' == 0){
                          document.getElementById("price'.$i.'").innerHTML = "Gratis";
                        }
                      </script>';
                      $i++;
                    }  
                    echo' 
                      </div>
                    </div>
                </section><!-- End Services Section -->';
          }
    ?>
      </div>
    </section>
    <!-- End Services Section -->

  </main><!-- End #main -->

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

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/counterup/counterup.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>

  <!-- Template Main JS File -->
   <script src="assets/js/main.js"></script>

  <!-- Script JS -->
  <script src="assets/js/script.js"></script>

  <?php include('assets/php/checkLog.php') ?>
 

</body>

</html>