<?php
$nom=$_POST['nom'];
$prix=$_POST['prix'];
$date=$_POST['date'];
$image=$_POST['img'];
header("Location: http://localhost:8081/produits/php/saveProd/nom/$nom/prix/$prix/date/$date/image/$image");

?>