
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Frameset//IT" "http://www.w3.org/TR/html4/frameset.dtd">
<html lang="it">

<head>

  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Easybook</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 
  <?php 
    session_start(); 
    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['username']);
        header("location: index.php");
    }
  ?>
 

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- CSS -->
  <link href="assets/css/style.css" rel="stylesheet">

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

  <!-- Main -->
  <main id="main">
    <?php
      $db = mysqli_connect('localhost', 'root', '', 'easybooks_db');
      if (isset($_GET['ebook_search'])) {
          $ebook= mysqli_real_escape_string($db, $_GET['ebook']);
          $query = "SELECT * FROM ebooks WHERE title='$ebook' OR genre='$ebook' OR date='$ebook' OR author='$ebook'";
          $results = mysqli_query($db, $query);
          $i = 0;
          if (mysqli_num_rows($results) > 0) {
            echo' <!-- ======= Services Section ======= -->
            <section id="services" class="services">
              <div class="container">
                <div id="catalog_ebook_1" class="row flow-offset-1">';
                while($row = $results->fetch_assoc()){
                  echo'
                    <div class="col-xs-6 col-md-4">
                    <a href="ebook_page.php?title='.$row['title'].'&author='.$row['author'].'&genre='.$row['genre'].'&year='.$row['date'].'&price='.$row['price'].'">
                      <div class="product"><img id="img_products" style="resize: both;" src="assets/ebook/'.$row['copertina'].'" alt="">
                        <div class="caption">
                        <h6>'.$row['title'].'</h6>
                        </a>
                          <span>
                            <pre class="author">'.$row['author'].'</pre>
                            <pre class="genre">'.$row['genre'].'</pre>
                            <pre id="price'.$i.'" class="price sale">'.$row['price'].'€</pre>
                            <pre class="year">'.$row['date'].'</pre>
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
          else{
              echo' <!-- ======= Services Section ======= -->
                <section id="services" class="services">
                  <div class="container">
                    <div id="catalog_ebook" class="row flow-offset-1">
                      <p id="results"> Nessun risultato trovato.<p>
                    </div>
                  </div>
                </section>';
          }
      }
    ?>
  </main>
  <!-- End Main -->
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
  
  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>

  <!-- Script JS -->
  <script src="assets/js/main.js"></script>
  <script src="assets/js/script.js"></script>

  <?php include('assets/php/checkLog.php') ?>
  <?php include('assets/php/checkPrice.php') ?>

  
</body>

</html>

