<?php
session_start();
if(!$_SESSION['token']){
  header('Location: index.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RAM--EKI - Home</title>
    <link rel="stylesheet" href="./asset_user/dist/main.css">
    <link rel="stylesheet" href="./asset_user/assets/css/style.css">
</head>

<body>
    <!-- Header Area Start -->
    <header class="header">
        <div class="header-bottom">
            <div class="container">
                <div class="d-none d-lg-block">
                    <nav class="menu-area d-flex align-items-center">
                        <div class="logo">
                        <a href="user.php"><img src="images/irisi.png" alt="logo" /></a>
                        </div>
                        <ul class="main-menu d-flex align-items-center">
                            <li><a class="active" href="user.php">Home</a></li>
                            <li>
                                <a href="javascript:void(0)">Category
                                    <svg xmlns="http://www.w3.org/2000/svg" width="9.98" height="5.69"
                                        viewBox="0 0 9.98 5.69">
                                        <g id="Arrow" transform="translate(0.99 0.99)">
                                            <path id="Arrow-2" data-name="Arrow" d="M1474.286,26.4l4,4,4-4"
                                                transform="translate(-1474.286 -26.4)" fill="none" stroke="#1a2224"
                                                stroke-linecap="round" stroke-linejoin="round" stroke-width="1.4" />
                                        </g>
                                    </svg>
                                </a>
                                <ul class="sub-menu">
                                    <?php
                                     $jsonurl = "http://localhost:8081/produits/catjson";
                                     $json = file_get_contents($jsonurl);
                                     $jsonDecode = json_decode($json, true);
                                     
                                     foreach($jsonDecode as $data){
                                    

                                  
                                    
                                    ?>
                                    <li><a href="shop?id_categorie=<?php echo $data['id_cat'];?>"><?php echo $data['libelle'];?></a></li>
                                    <?php
                                    }
                                    ?>
                                </ul>
                            </li>
                            <?php if(isset($_SESSION['token']) && $_SESSION['token']==1){?>
                            <li><a href="dashboard.php">ADMIN</a></li>
                            <?php }?>
                        </ul>
                        
                        
                        <div class="menu-icon ml-auto">
                            <ul>
                            <li><a href='logout.php'>LOGOUT</a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
                <!-- Mobile Menu -->
                
                <!-- Body overlay -->
                <div class="overlay" id="overlayy"></div>
            </div>
        </div>
    </header>
    <!-- Header Area End -->

    <main>

<!-- BreadCrumb Start-->
<section class="breadcrumb-area mt-15">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">

                <h5>Shop</h5>
            </div>
        </div>
    </div>
</section>
<!-- BreadCrumb Start-->

<!-- Catagory Search Start -->
<!-- Catagory Search End -->

<!-- Catagory item start -->

<!-- Catagory item End -->

<!-- Populer Product Strat -->
<section class="populerproduct bg-white p-0 shop-product">
    <div class="container">
        <div class="row">
            <?php
            $jsonurl = "http://localhost:8081/produits/api";
            $json = file_get_contents($jsonurl);
            $jsonDecode1 = json_decode($json, true);
            $id=$_GET['id_categorie'];
            
            foreach($jsonDecode1 as $data){
                if($data['id_cat']==$id){
            ?>
            <div class="col-md-4 col-sm-6">
                <div class="product-item">
                    <div class="product-item-image">
                        <a href="produit_details?id_prod=<?php echo $data['idProduit'];?>"><img src="image/<?php echo $data['image']; ?>" alt="Product Name"
                                class="img-fluid"></a>
                      
                    </div>
                    <div class="product-item-info">
                        <a href="produit_details?id_prod=<?php echo $data['idProduit'];?>"><?php echo $data['nomProduit'];?></a>
                        <span><?php echo "MAD" .$data['prixProduit'];?></span> <del>MAD<?php echo $data['prixProduit'] + ($data['prixProduit'] * 0.5);?></del>
                    </div>
                </div>
            </div>
            <?php
            }
            }
            ?>
            
        </div>
    </div>
</section>
<!-- Populer Product End -->


<!-- Pagination End -->

</main>


    <!-- Footer -->
    <footer style="background-color:black;">
        <div class="container" >
            
            <div class="row main-footer">
                <div class="col-lg-4 col-md-12 col-sm-12 col-12">
                    <div class="main-footer-info">
                        <img src="images/irisi_black.png" alt="Logo" class="img-fluid">
                    </div>
                </div>
                <div class="col-lg-2 offset-lg-2 col-md-4 col-sm-6 col-12">
                    <div class="main-footer-quicklinks">
                        <h1 style="text-align:center;color:white;">Soyez le bienvenue !</h1>
                        
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="copyright d-flex justify-content-between align-items-center">
                        <div class="copyright-text order-2 order-lg-1">
                            <p>&copy; 2022. Design and Developed by <a href="copyright.php">LABZIOUI Ikrame & BENHAMMOU Karim</a></p>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer -->

    <script src="./asset_user/src/js/jquery.min.js"></script>
    <script src="./asset_user/src/js/bootstrap.min.js"></script>
    <script src="./asset_user/src/scss/vendors/plugin/js/slick.min.js"></script>
    <script src="./asset_user/src/scss/vendors/plugin/js/jquery.nice-select.min.js"></script>
    <script src="./asset_user/dist/main.js"></script>
    <script>
        function openNav() {

            document.getElementById("mySidenav").style.width = "350px";
            $('#overlayy').addClass("active");
        }

        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
            $('#overlayy').removeClass("active");
        }
    </script>
</body>
</html>