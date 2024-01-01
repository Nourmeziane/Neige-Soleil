<br>
<img src="images/capture-ecran-site-airfrance.png" height="450" width="800">
<br>
<?php
    if(isset($_SESSION['email'])){
        echo "Connecté en tant que : " . $_SESSION['role'];
    }
?>
<br>
<a href="https://wwws.airfrance.fr/"> Le site d'Air France </a>
<br>
<br>
<br>