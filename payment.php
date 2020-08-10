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
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>


  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <link href="assets/css/style.css" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">

  <style>
    .submit-button {
        margin-top: 60px;
    }
  </style>
 
  <!-- =======================================================
  * Template Name: Groovin - v2.1.0
  * Template URL: https://bootstrapmade.com/groovin-free-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>
<body>

  <main id="main">

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
        <div class="container">
            <div class='row'>
                <div class='col-md-4'></div>
                <div class='col-md-4'>
                  <script src='https://js.stripe.com/v2/' type='text/javascript'></script>
                  <form accept-charset="UTF-8" action="buy_catalog.php?title=<?php echo $_GET['title']?>" class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="pk_bQQaTxnaZlzv4FnnuZ28LFHccVSaj" id="payment-form" method="post">
                    <div style="margin:0;padding:0;display:inline">
                      <input name="utf8" type="hidden" value="✓" />
                      <input name="_method" type="hidden" value="PUT" />
                      <input name="authenticity_token" type="hidden" value="qLZ9cScer7ZxqulsUWazw4x3cSEzv899SP/7ThPCOV8=" />
                    </div>
                    <div class='form-row'>
                      <div class='col-xs-12 form-group required'>
                        <label class='control-label'>Nome dell'intestatario</label>
                        <input class='form-control' size='20' type='text' required>
                      </div>
                    </div>
                    <div class='form-row'>
                      <div class='col-xs-12 form-group required'>
                        <label class='control-label'>Numero della carta</label>
                        <input autocomplete='off' class='form-control card-number' size='20' type='number' required>
                      </div>
                    </div>
                    <div class='form-row'>
                      <div class='col-xs-4 form-group cvc required'>
                        <label class='control-label'>CVC</label>
                        <input autocomplete='off' class='form-control card-cvc' placeholder='Es. 311' size='4' type='password' required>
                      </div>
                      <div class='col-xs-4 form-group expiration required'>
                        <label class='control-label'>Scadenza</label>
                        <input class='form-control card-expiry-month' style="height:calc(1.5em + .75rem + 2px);" placeholder='MM' size='2' min="1" max="12" type='number' required>
                      </div>
                      <div class='col-xs-4 form-group expiration required'>
                        <label class='control-label'> </label>
                        <input class='form-control card-expiry-year' style="height:calc(1.5em + .75rem + 2px);" placeholder='YYYY' min="2015" max="2025" size='' type='number' required>
                      </div>
                    </div>
                    <div class='form-row'>
                      <div class='col-md-12'>
                        <div class='form-control total btn btn-info' style="background:#5c9f24;border:none">
                          Totale:
                            <span class='amount'> 
                                <?php
                                    echo $_GET['price']; 
                                ?>€
                            </span>
                        </div>
                      </div>
                    </div>
                    <div class='form-row'>
                      <div class='col-md-12 form-group'>
                        <button name="paga" class='form-control btn btn-primary submit-button' style="background:#5c9f24;border:none" type='submit'>Paga »</button>
                      </div>
                    </div>
                    <div class='form-row'>
                      <div class='col-md-12 error form-group hide'>
                        <div class='alert-danger alert'>
                          Per favore correggi gli errori e riprova
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
                <div class='col-md-4'></div>
            </div>
        </div>
    </section>
    <!-- End Services Section -->
  </main>
  <!-- End #main -->
  
  <!-- Footer -->
  <footer class="page-footer font-small blue">
    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">
        <label style="opacity: 1; color: black">© 2020 Copyright: Clarissa Carbonaro</label>
    </div>
    <!-- End Copyright -->
  </footer>
  <!-- End Footer -->

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

</body>

</html>