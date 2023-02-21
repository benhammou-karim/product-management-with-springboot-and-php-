<?php
$image=$_POST['img'];
$mail=$_POST['mail'];
$password=$_POST['password'];
if($_POST['role']=="admin"){
    $_POST['role']=1;
}else{
    $_POST['role']=0;
}
$role=$_POST['role'];
header("Location: http://localhost:8081/produits/user/saveUser/image/$image/password/$password/role/$role/mail/$mail");


?>