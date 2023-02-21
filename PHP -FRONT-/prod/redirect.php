<?php
$valid=false;
if(isset($_POST['mail']) and isset($_POST['passwd'])){
    $login=$_POST['mail'];
    $passwd=$_POST['passwd'];

}
if($login and $passwd){
    $valid=true;
}
if($valid){
    header("Location: http://localhost:8081/produits/UA/testerUser/login/$login/passwd/$passwd");

}else{
    header("Location: index.php?msg= veiller remplir tous les champs !!");
}

?>