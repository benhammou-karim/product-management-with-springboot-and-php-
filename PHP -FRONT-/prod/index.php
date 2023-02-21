<?php
session_start();
if(isset($_SESSION['token']) && $_SESSION['token']==1){
  header('Location: dashboard.php');
}elseif(isset($_SESSION['token']) && $_SESSION['token']==2){
  header('Location: user.php');
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Signin Template for Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">

    <!-- Bootstrap core CSS -->
    <link href="bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>

  <body class="text-center">
    <form class="form-signin" action="redirect.php" method="post">
      <img class="mb-4" src="images/irisi.png" alt="" width="200px" height="72">
      <h1 class="h3 mb-3 font-weight-normal">veuillez se connecter</h1>
      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="email" name="mail" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" name="passwd" id="inputPassword" class="form-control" placeholder="Password" required>
      <input class="btn btn-lg btn-primary btn-block" type="submit" value="se connecter">
      <p class="mt-5 mb-3 text-muted">&copy; 2022</p>
    </form>
  </body>
</html>

<?php
if(isset($_GET['msg'])){
    echo $_GET['msg'];
}

?>