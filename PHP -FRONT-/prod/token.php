<?php
session_start();
if(isset($_GET['token'])){
  $_SESSION['token']= $_GET['token'];
  if($_SESSION['token']==1)
    header('Location: dashboard.php');  
  else
    header('Location: user.php');  
  }
if(!$_SESSION['token']){
  header('Location: index.php');
}



?>