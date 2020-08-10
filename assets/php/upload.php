
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  </head>
  <body>
    
    <div class="content_page" style="background:white;">
      <main id="main">
        <section id="check_preventivo" class="d-flex align-items-center" style="position:relative; top: 150px"> 
          <div class="container position-relative" data-aos="fade-up" data-aos-delay="500">
            <div class="end_form">
              <hr style="padding-bottom: 0%; width: 50%; color: black;">
              <div class="form-row">
                <div class="form-group col-md-12" style="text-align: center;">
                    <img src="../img/tick.png" style="width: 80px;"/>
                    <p>Hai caricato il tuo ebook con successo.</p>
                    <p>Sarai reindirizzato a breve...</p>
                </div>
                
              </div>
              <hr style="padding-bottom: 0%;width: 50%; color: black;">  
          </div> 
        </section>

      </main>
      <!-- End #main -->
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
  </body>

</html>

<script>
    $(window).on('load', function(){
        $(document).ready(function () {
            window.setTimeout(function () {
                location.href = "../../index.php";
            }, 3000);
        });
    });
</script>
<?php
    // Inizio la sessione
    session_start();
    $title = "";
    $author = "";
    $genre = "";
    $date = "";
    $description = "";
    
    $errors = array(); 
    
    // Effettuo la connessione al database
    $db = mysqli_connect('localhost', 'root', '', 'easybooks_db');
    

    // UPLOAD NEW EBOOK
    if (isset($_POST['upload'])) {
        // Uplaod del file PDF
        $targetDir = "../../assets/ebook/";
        $fileName = basename($_FILES["file"]["name"]);
    
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

        //Upload della copertina
        $imageName = basename($_FILES["copertina"]["name"]);
    
        $targetImagePath = $targetDir . $imageName;
        $imageType = pathinfo($targetImagePath,PATHINFO_EXTENSION);

        // Se il campo del pdf non è vuoto
        if(!empty($_FILES["file"]["name"])){

            $allowTypesPdf = array('pdf');
            $allowTypesImg = array('jpg','png');
            if (empty($title)) { array_push($errors, "Title is required"); }

            $title = mysqli_real_escape_string($db, $_POST['title']);

            // Verifico che l'ebook non esista già all'interno del database
            $ebook_check_query = "SELECT * FROM ebooks WHERE title='$title' LIMIT 1";
            $result = mysqli_query($db, $ebook_check_query);
            $ebook = mysqli_fetch_assoc($result);

                // Se l'ebook esiste attivo il modal di avvertimento
                if ($ebook && $ebook['title'] === $title) {
                    array_push($errors, "Title already exists");
                    echo "<script type='text/javascript'>
                            alert('Questo ebook esiste');
                            $(document).ready(function(){
                            $('#myModalEbook').modal('show');
                            });
                        </script>";
                }

            // Se non si verifica alcun errore nella compilazione dei dati carico l'ebook con le sue info nel database
            else {
                // Prelevo tutte le informazioni del nuovo ebook da caricare
                $author = mysqli_real_escape_string($db, $_POST['author']);
                $genre = mysqli_real_escape_string($db, $_POST['genre']);
                $date = $_POST['date'];
                $timestamp = date('Y-m-d H:i:s', strtotime($date));  
                $description = mysqli_real_escape_string($db, $_POST['description']);

                // Mi accerto che i campi non siano vuoti
                if (empty($author)) { array_push($errors, "Author is required"); }
                if (empty($genre)) { array_push($errors, "Genre is required"); }
                if (empty($date)) { array_push($errors, "Date is required"); }
                if (empty($description)) { array_push($errors, "Description is required"); }

                // Verifico che il tipo proposto sia quello consentito dal sistema
                if(in_array($fileType, $allowTypesPdf)){// Sposto il file nella directory designata
                    if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
                        $insert = $db->query("INSERT into ebooks (title,author,genre,description,date,file_name, uploaded_on, copertina)
                         VALUES ('$title','$author','$genre','$description','$timestamp','".$fileName."', NOW(),'$imageName')");
                         // Se la query avviene con successo
                          if($insert){
                            $_SESSION['title'] = $title;
                            // Reindirizzo la pagina ad una di conferma e caricamento
                            echo "<script>redirect()</script>";
                          }
                          else{// Altrimenti
                           echo "Upload fallito, riprova.";
                          }
                    }
                    else{
                        echo "C'è stato un errore con l'upload del tuo file.";
                    }
                }
                else{
                    echo 'Solo file di tipo pdf, jpg e png sono consentiti.';
                }
            }
        }
        else{
          // Se il campo è vuoto, chiedo di riempirlo
            echo $statusMsg = 'Per favore seleziona un file da caricare.';
        }

    }
?>
