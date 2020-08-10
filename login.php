<?php include('assets/php/server.php') ?>
<!DOCTYPE html>
<html>
  <head>
        <meta charset="UTF-8">
        <!--Definisce l'autore della pagina web-->
        <meta name="Clarissa Carbonaro">
        <meta http-equiv="X-US-Compatible" content="IE=edge">
        <!--Definisce lo scaling su altri dispositibi-->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--Definisce le parole chiavi per la ricerca degli engine-->
        <meta name="keyword" content="HTML, CSS, JavaScript, PHP">
        <meta http-equiv="X-US-Compatible" content="IE=edge">
         <!-- Reset CSS -->
         <link href="assets/css/style_login.css" rel="stylesheet">
         
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


        <title>Signin-EasyBooks</title>
    </head>

  <body>
    <main id="main">
      <!-- ======= Services Section ======= -->
      <section id="services" class="services">
                <div class="container" id="background">
                    <div class="menu">
                        <h1 class="logo"><a href="index.php">Easybook</a></h1>
                    </div>
                    <div class="login">
                      <form class="log_user" method="POST" action="login.php">
                        <div id="intestazione">
                          <h1> Accedi</h1>
                        </div>
                        <div class="form-row">
                          <div class="form-group col-md-12">
                            <input type="text" placeholder="Username/Email"
                                                            name="username" id="username" required>
                          </div>
                        </div>
                        <div class="form-row">
                          <div class="form-group col-md-12">
                            <input type="password" name="password" id="password" placeholder="Password" required>
                          </div>
                        </div>
                        <div id="btn">
                          <button type="submit" class="get-started-btn scrollto" name="accedi" data-toggle="modal" data-target="#myModal_log" value="Accedi">ACCEDI</button>
                       </div>
                        <div id="rememberuser">
                            <input type="checkbox" name="remember" style="font-size:500px;"> Ricordami
                        </div>
                        <label id="signin_user" style="margin-top: 40px;">Non possiedi ancora un account?<a href="signin.php"> Registrati</a></label>
                      </form>
                    </div>
                </div>      
                <!-- Modal -->
                <div class="modal fade" id="myModal_log" style="text-align: center;">
                  <div class="modal-dialog modal-sm modal-dialog-centered">
                      <!-- Modal content-->
                      <div class="modal-content">
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">ATTENZIONE</h4>
                          </div>
                          <div class="modal-body">
                              <p>Questo username non esiste.</p>
                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          </div>
                      </div>
                  </div>
                </div>
                    <!-- END The Modal -->
      </section>
    </main><!-- End #main -->
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
  <!-- Script JS -->
  <script src="assets/js/main.js"></script>
  </body>
</html>