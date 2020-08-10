
<?php  
    //Verifico che l'utente sia loggato e mostro il menu per l'utente registrato
    if (isset($_SESSION['username'])){
        echo '<script>
            document.getElementById("sign").style.display="none";
            document.getElementById("log").style.display="none";
            document.getElementById("Topnav_1").style.display="inline";
            $(document).on("click", ".mobile-nav-toggle", function(e) {
                $(".sign").hide();
                $(".log").hide();
                $(".Topnav_1").show();
              });
        </script>';
    }
    else{
        echo '<script>
            document.getElementById("sign").style.display="block";
            document.getElementById("log").style.display="block";
            document.getElementById("Topnav_1").style.display="none";
            $(document).on("click", ".mobile-nav-toggle", function(e) {
                $(".Topnav_1").hide();
                $(".sign").show();
                $(".log").show();    
              });
        </script>';
    }
?>