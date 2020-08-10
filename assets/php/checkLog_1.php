
<?php  

    //Verifico che l'utente sia loggato e mostro il menu per l'utente registrato
    if (isset($_SESSION['username'])){
        echo '<script>
            document.getElementById("Topnav_1").style.display="inline";
            document.getElementById("sign").style.display="none";
            document.getElementById("log").style.display="none";
            $(document).on("click", ".mobile-nav-toggle", function(e) {
                $(".sign").hide();
                $(".log").hide();
                $(".Topnav_1").show();
              });
        </script>';
        if(($_GET['price'] > 0)){
            echo '<script>
                document.getElementById("payment").style.display="inline";
            </script>';
        }
        else{
            echo '<script>
            document.getElementById("payment").style.display="none";
            document.getElementById("read").style.display="inline";
            document.getElementById("download").style.display="inline";
            </script>';
        }
       
    }
    else{
        echo '<script>
            document.getElementById("Topnav_1").style.display="none";
            document.getElementById("payment").style.display="none";
            document.getElementById("read").style.display="none";
            document.getElementById("download").style.display="none";
            $(document).on("click", ".mobile-nav-toggle", function(e) {
                $(".Topnav_1").hide();
                $(".sign").show();
                $(".log").show();    
              });
        </script>';
    }
?>