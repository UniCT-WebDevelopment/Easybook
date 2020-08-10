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
         <link href="assets/css/style_signin.css" rel="stylesheet">
        <!-- FONT -->
        <link href="http://it.allfont.net/allfont.css?fonts=bodoni" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


        <title>Signin-EasyBooks</title>
    </head>

    <body>
        <!--  Header  -->
        <header>
            <div class="menu">
                <h1 class="logo"><a href="index.php">Easybook</a></h1>
            </div>
        </header>

        <!--  Main  -->
        <main id="main">
            <!-- ======= Services Section ======= -->
            <section id="services" class="services">
                <div class="container" id="background">
                    <div class="signin">
                        <form class="sign_user" method="POST" action="signin.php">
                            <div id="intestazione">
                                <h1> Registrati</h1>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <input type="text" id="name" name="name" maxlength="16" placeholder="Nome" required title="Deve avere massimo 16 caratteri"> 
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <input type="text" id="surname" name="surname" maxlength="16" placeholder="Cognome" required title="Deve avere massimo 16 caratteri">
                                    
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <input type="text" id="email" name="username" placeholder="Username/Email" required title="Deve avere massimo 24 caratteri">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <input type="password" id="password" name="password" id="id_psw" placeholder="Password" required>
                                </div>
                                <div class="form-group col-md-12">
                                    <input type="password" id="c_password" name="c_password" id="id_cpsw" placeholder="Conferma password" required>
                                </div>
                            </div>
                            <div id="btn">
                                <button type="submit" class="get-started-btn scrollto" name="registrati" data-toggle="modal" data-target="#myModal" value="Registrati">REGISTRATI</button>
                                <label id="log_user">Possiedi già un account?<a href="login.php"> Accedi</a></label>
                            </div>
                           
                        </form>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="myModal" style="text-align: center;">
                    <div class="modal-dialog modal-sm modal-dialog-centered">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">ATTENZIONE</h4>
                            </div>
                            <div class="modal-body">
                                <p>Questo username esiste già.</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END The Modal -->
            </section>
            <!-- End Services Section -->
            
            <!-- Footer -->
            <footer class="page-footer font-small blue" style="position: relative; bottom: 50px;">
                <!-- Copyright -->
                <div class="footer-copyright text-center py-3">
                    <label style="opacity: 1; color: black; margin-right: 45px">© 2020 Copyright: Clarissa Carbonaro</label>
                </div>
                <!-- End Copyright -->
            </footer>
            <!-- End Footer -->
        </main>
        <!-- End Main  -->
           
        <!-- Preloader -->
        <div id="preloader"></div>

        <!-- Script JS -->
        <script src="assets/js/main.js"></script>
    </body>
</html>