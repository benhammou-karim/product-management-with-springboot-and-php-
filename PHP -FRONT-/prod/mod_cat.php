<?php
session_start();
if(!$_SESSION['token']){
  header('Location: index.php');
}
if($_SESSION['token']==2){
  header('Location: user.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>RoyalUI Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo me-5" href="../../index.html"><img src="images/irisi.png" class="me-2" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="../../index.html"><img src="images/logo.png" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="ti-view-list"></span>
        </button>
        <ul class="navbar-nav navbar-nav-right">
          
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown">
            <?php
                      $jsonurl = "http://localhost:8081/produits/userjson";
                      $json = file_get_contents($jsonurl);
                      $jsonDecode = json_decode($json, true);
                      foreach($jsonDecode as $mydata){
                        if($mydata['admn']==1){
                    ?>
              <img src="image/<?php echo $mydata['image']; ?>" alt="profile"/>
              <?php }  } ?>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
            <a class="dropdown-item" href="user.php">
                <i class="ti-settings text-primary"></i>
                site
              </a>
              <a class="dropdown-item" href="logout.php">
                <i class="ti-power-off text-primary"></i>
                Deconnecter
              </a>
            </div>
          </li>
          
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="ti-view-list"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:../../partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
      <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="dashboard.php">
              <i class="ti-shield menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="ti-palette menu-icon"></i>
              <span class="menu-title">Utilisateur</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="create_user.php">ajouter un utilisateur</a></li>
                <li class="nav-item"> <a class="nav-link" href="list_user.php">utilisateurs</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basi" aria-expanded="false" aria-controls="ui-basi">
              <i class="ti-palette menu-icon"></i>
              <span class="menu-title">categorie</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basi">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="create_cat.php">ajouter une categorie</a></li>
                <li class="nav-item"> <a class="nav-link" href="list_cat.php">categories</a></li>
              </ul>
            </div>
          </li><li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-bas" aria-expanded="false" aria-controls="ui-bas">
              <i class="ti-palette menu-icon"></i>
              <span class="menu-title">produit</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-bas">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="create.php">ajouter un produit</a></li>
                <li class="nav-item"> <a class="nav-link" href="list.php">produits</a></li>
              </ul>
            </div>
          </li>
        </ul>
      </nav>
<?php
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$new = str_replace('%20', ' ', $actual_link);
$url_components = parse_url($actual_link);
parse_str($url_components['query'], $params);  // cut every query(id, nom, prix) and put it in $params


if(!$params['bool']){
    header('Location: list_cat.php');
}

?>


 <!-- partial -->
 <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">ajouter une categorie</h4>
                  <form class="forms-sample" action="http://localhost:8081/produits/phpcat/updateCat" method="post">
                    <div class="form-group">
                      <label for="exampleInputName1">Id</label>
                      <input type="text" name="id_cat" value="<?php echo $params['id'] ?>" class="form-control" id="exampleInputName1" placeholder="">
                    </div>
    
                    <div class="form-group">
                    <label for="exampleInputName1">Libelle</label>
                      <input type="text" name="libelle" value="<?php echo $params['libelle'] ?>" class="form-control" id="exampleInputName1" placeholder="">
                    </div>
                
                    <input type="submit" class="btn btn-primary me-2" value="Submit">
                    <input type="reset" class="btn btn-light" value="Cancel">
                  </form>
                </div>
              </div>
            </div>
          
               
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
          <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © <a href="copyright.php" target="_blank">BENHAMMOU KARIM & LABZIOUI IKRAME</a>2022</span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/file-upload.js"></script>
  <!-- End custom js for this page-->
</body>

</html>
