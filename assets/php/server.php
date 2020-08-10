<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <?php
    // Inizio la sessione
    session_start();
    $username = "";
    $name = "";
    $surname = "";
    $errors = array(); 
    
    // Effettuo la connessione al database
    $db = mysqli_connect('localhost', 'root', '', 'easybooks_db');

    // REGISTRAZIONE NUOVO UTENTE
    if (isset($_POST['registrati'])) {
        
        // Preleveo i dati dell'utente dal form 
        $username = mysqli_real_escape_string($db, $_POST['username']);
        $name = mysqli_real_escape_string($db, $_POST['name']);
        $surname = mysqli_real_escape_string($db, $_POST['surname']);
        $password = mysqli_real_escape_string($db, $_POST['password']);
        $c_password = mysqli_real_escape_string($db, $_POST['c_password']);

        if (empty($username)) { array_push($errors, "Username is required"); }
        if (empty($email)) { array_push($errors, "Email is required"); }
        if (empty($password)) { array_push($errors, "Password is required"); }
        
        // Verifico che l'utente non esista già all'interno del database
        $user_check_query = "SELECT * FROM iscritti WHERE username='$username' LIMIT 1";
        $result = mysqli_query($db, $user_check_query);
        $user = mysqli_fetch_assoc($result);

        if ($user) { // Se l'utente esiste attivo il modal di avvertimento
            if ($user['username'] === $username) {
                array_push($errors, "Username already exists");
                echo "<script type='text/javascript'>
                        $(document).ready(function(){
                        $('#myModal').modal('show');
                        });
                    </script>";
            }
        }
        else if($password != $c_password){
            echo'
            <script>alert("Le due password non corrispondono");</script>';
        }
        // Se non si verifica alcun errore nella compilazione dei dati registro l'utente nel database
        else {
            $password = md5($password);//Cripto la password prima di registrarla

            $query = "INSERT INTO iscritti (username,name, surname, password) 
                    VALUES('$username', '$name','$surname', '$password')";
            mysqli_query($db, $query);
            $_SESSION['username'] = $username;
            $query_name = "SELECT name FROM iscritti WHERE username='$username'";
            $result = mysqli_query($db, $query_name);
            $_SESSION['name'] =  $result->fetch_object()->name;
            $_SESSION['success'] = "You are now logged in";
            if(!empty($_POST["remember"])) {
                setcookie ("username",$_POST["username"],time()+ 3600);
                setcookie ("password",$_POST["password"],time()+ 3600);
            } else {
                setcookie("username","");
                setcookie("password","");
            }
            // Reindirizzo la pagina ad una di conferma e caricamento
            header('location: confirm.html');
        }
    }

    // LOGIN UTENTE
    if (isset($_POST['accedi'])) {
        $username = mysqli_real_escape_string($db, $_POST['username']);
        $password = mysqli_real_escape_string($db, $_POST['password']);

       
        if (count($errors) == 0) {
            $password = md5($password);
            $query = "SELECT * FROM iscritti WHERE username='$username' AND password='$password'";
            $results = mysqli_query($db, $query);
            if (mysqli_num_rows($results) == 1) {
                $query_name = "SELECT name FROM iscritti WHERE username='$username'";
                $result = mysqli_query($db, $query_name);
                $_SESSION['name'] =  $result->fetch_object()->name;
                $_SESSION['username'] = $username;
                header('location: index.php');
            }else {
                echo "<script type='text/javascript'>
                    $(document).ready(function(){
                    $('#myModal_log').modal('show');
                    });
                </script>";
            }
        }
    }
?>