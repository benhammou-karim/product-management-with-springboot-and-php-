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
        <!--Banner Area Start -->
        <section class="banner-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 order-2 order-lg-1">
                        <div class="banner-area__content">
                            <h2>Premium care for
                                premium people.</h2>
                            <p>découvrir notre monde !</p>
                        </div>
                    </div>
                    <div class="col-lg-6 order-1 order-lg-2">
                        <div class="banner-area__img">
                            <img src="images/slide.jpg" alt="banner-img" class="img-fluid">
                        </div>
                    </div>
                </div>
                
            </div>
        </section>
        <!--Banner Area End -->

        <!-- Features Section Start -->
        <section class="features">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="section-title">
                            <h2>Nos Produits</h2>
                        </div>
                    </div>
                </div>
                <div class="features-wrapper">
                    <div class="features-active">
                <?php
                $jsonurl = "http://localhost:8081/produits/api";
                $json = file_get_contents($jsonurl);
                $jsonDecode1 = json_decode($json, true);
                
                foreach($jsonDecode1 as $row){
                ?>

                
                        <div class="product-item">
                            <div class="product-item-image">
                                <a href="produit_details?id_prod=<?php echo $row['idProduit'];?>"><img src="image/<?php echo $row['image'];?>" alt="Product Name"
                                        class="img-fluid"></a>
                                
                            </div>
                            <div class="product-item-info">
                                <a href="produit_details?id_prod=<?php echo $row['idProduit'];?>"><?php echo $row['nomProduit'];?></a>
                                <span><?php echo "MAD" .$row['prixProduit'];?></span> <del>MAD<?php echo $row['prixProduit'] + ($row['prixProduit'] * 0.5);?></del>
                            </div>
                        </div>
                      
                   
                    <?php
                       }
                       ?>
                    </div>
                    <div class="slider-arrows">
                        <div class="prev-arrow">
                            <svg xmlns="http://www.w3.org/2000/svg" width="9.414" height="16.828"
                                viewBox="0 0 9.414 16.828">
                                <path id="Icon_feather-chevron-left" data-name="Icon feather-chevron-left"
                                    d="M20.5,23l-7-7,7-7" transform="translate(-12.5 -7.586)" fill="none"
                                    stroke="#1a2224" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                            </svg>
                        </div>
                        <div class="next-arrow">
                            <svg xmlns="http://www.w3.org/2000/svg" width="9.414" height="16.828"
                                viewBox="0 0 9.414 16.828">
                                <path id="Icon_feather-chevron-right" data-name="Icon feather-chevron-right"
                                    d="M13.5,23l5.25-5.25.438-.437L20.5,16l-7-7" transform="translate(-12.086 -7.586)"
                                    fill="none" stroke="#1a2224" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" />
                            </svg>
                        </div>
                    </div>
                </div>
               
            </div>
        </section>
        <!-- Features Section End -->



     



        <!-- Categorys Section Start -->
        <section class="categorys">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="section-title">
                            <h2>Shop with top categorys</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                       <?php 
                                                            foreach($jsonDecode as $row1)
                                                                {
                       ?>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                        <div class="productcategory text-center">
                            <div class="productcategory-img">
                                <a href="shop?id_categorie=<?php echo $row1['id_cat'];?>"></a>
                            </div>
                            <div class="productcategory-text">
                                <a href="shop?id_categorie=<?php echo $row1['id_cat'];?>">
                                    <h6><?php echo $row1['libelle'];?></h6>
                                    <span>
                                     

                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php
                    }
                    ?>

                </div>
               
            </div>
        </section>
        <!-- Categorys Section End -->

       
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