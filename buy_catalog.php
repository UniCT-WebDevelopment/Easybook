<!DOCTYPE html>
<html lang="it">
  <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Easybooks</title>
    <meta content="" name="descriptison">
    <meta content="" name="keywords">
    <!-- Google Fonts -->
    <link
      href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
      rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">

    <!-- CSS -->
    <link href="assets/css/style.css" rel="stylesheet">

  </head>
  <body>
    <div class="content_page" style="background:white;">
      <main id="main">
        <section  class="d-flex align-items-center">
          <div class="end_form">
            <hr style="padding-bottom: 0%; width: 50%; color: black;">
            <div class="form-row">
              <div class="form-group col-md-12" style="text-align: center;">
                <img src="assets/img/tick.png" style="width: 80px;"/>
                <p>Pagamento effettuato con successo.</p>
                <p>Sarai reindirizzato a breve...</p>
              </div>
            </div>
            <hr style="padding-bottom: 0%;width: 50%; color: black;">  
          </div>
        </section>
      </main>
      <!-- End #main -->
    </div>
       
  <!-- Preloader -->
  <div id="preloader"></div>
 <!-- Footer -->
 <footer class="page-footer font-small blue">
  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2020 Copyright:
      <label> Clarissa Carbonaro</label>
  </div>
  <!-- Copyright -->
</footer>
<!-- Footer -->
  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>

    
  <!-- Script JS -->
  <script src="assets/js/main.js"></script>
  <script src="assets/js/script.js"></script>
  <?php
    $title = "";
    $errors = array(); 
  
    // Effettuo la connessione al database
    $db = mysqli_connect('localhost', 'root', '', 'easybooks_db');
    

    // UPLOAD NEW BUY
      if (isset($_POST['paga'])) {

        $title = mysqli_real_escape_string($db, $_GET['title']);

        // Verifico che l'ebook non esista già all'interno del database
        $ebook_check_query = "SELECT * FROM acquisti WHERE titolo='$title' LIMIT 1";
        $result = mysqli_query($db, $ebook_check_query);
        $ebook = mysqli_fetch_assoc($result);
        
        // Se l'ebook esiste attivo il modal di avvertimento
        if ($ebook && $ebook['titolo'] === $title) {
            array_push($errors, "Title already exists");
            echo "<script type='text/javascript'>
                    alert('Hai già comprato questo ebook');
                    location.href = 'index.php';
                </script>";
        }

        // Se non si verifica alcun errore nella compilazione dei dati carico l'ebook con le sue info nel database
        else {
          $ebook_check_query = "SELECT title,copertina,file_name FROM ebooks WHERE title='$title'";
          $result = mysqli_query($db, $ebook_check_query);
          $ebook = mysqli_fetch_assoc($result);
          // Verifico che il tipo proposto sia quello consentito dal sistema
            $copertina = $ebook['copertina'];
            echo $copertina;
            $pdf = $ebook['file_name'];
            echo $pdf;
            $insert = $db->query("INSERT into acquisti (titolo,copertina,pdf)
              VALUES ('$title','$copertina','$pdf')");
              // Se la query avviene con successo
              if($insert){
                // Reindirizzo la pagina ad una di conferma e caricamento
                echo "<script>
                $(window).on('load', function(){
                    $(document).ready(function () {
                        window.setTimeout(function () {
                            location.href = 'acquisti.php';
                        }, 3000);
                    });
                });</script>";
              }
              else{// Altrimenti
                echo "Acquisto fallito, riprova.";
              }
        }
    }
  ?>
  </body>

</html>

