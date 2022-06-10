<?php
session_start();
include 'Controllers/getCategories.php';
include "method/core.php";
$obj = new Plant();
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="description" content="">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Title -->
        <title>Book Shop</title>

        <!-- Favicon -->
        <link rel="icon" href="img/1.png">

        <!-- Core Stylesheet -->
        <link rel="stylesheet" href="style.css">

    </head>

    <body>
        <!-- Preloader -->
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class=""></div>
            <div class="">
                <img src="img/1.png" alt="">
            </div>
        </div>

        <!-- ##### Header Area Start ##### -->
        <header class="header-area">

            <!-- ***** Top Header Area ***** -->


            <!-- ***** Navbar Area ***** -->
            <div class="alazea-main-menu">
                <div class="classy-nav-container breakpoint-off">
                    <div class="container">
                        <!-- Menu -->
                        <nav class="classy-navbar justify-content-between" id="alazeaNav">

                            <!-- Nav Brand -->
                            <a href="" class="nav-brand">
                                <img src="img/1.png" style="width: 255px; height:224px;">
                            </a>

                            <!-- Navbar Toggler -->
                            <div class="classy-navbar-toggler">
                                <span class="navbarToggler"><span></span><span></span><span></span></span>
                            </div>

                            <!-- Menu -->
                            <div class="classy-menu">

                                <!-- Close Button -->
                                <div class="classycloseIcon">
                                    <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                                </div>


                                <!-- Navbar Start -->
                                <div class="classynav">
                                    <ul>
                                        <li><a href="index.php">Home</a></li>
                                        <li><a href="#">Categories</a>
                                            <ul class="dropdown">
                                                <?php foreach ((new getCategories())->all() as $category){
                                                    echo <<<ZAKI
<li><a  href="shop.php?category={$category[0]}">{$category[1]}</a></li>
ZAKI;
                                                }
                                                ?>
                                            </ul>
                                        </li>
                                        <li><a href="#">Shop</a>
                                            <ul class="dropdown">
                                                <li><a href="shop.php">Book Shop</a></li>

                                            </ul>
                                        </li>
                                        <!--<li><a href="#">Admin</a>
                                            <ul class="dropdown">
                                                <li><a href="login.php">    
                                                        <?php
/*                                                        if (isset($_SESSION['em'])) {
                                                            echo 'Profile';
                                                        } else {
                                                            echo 'Login';
                                                        }
                                                        */?>
                                                    </a>

                                            </ul>
                                        </li>-->

                                        <li><a href="contact_us.php">Contact</a></li>
                                    </ul>
                                </div>
                                <!-- Navbar End -->
                            </div>
                        </nav>



                        <!-- Search Form -->
                        <div class="search-form">
                            <form action="#" method="get">
                                <input type="search" name="search" id="search" placeholder="Type keywords &amp; press enter...">
                                <button type="submit" class="d-none"></button>
                            </form>
                            <!-- Close Icon -->
                            <div class="closeIcon"><i class="fa fa-times" aria-hidden="true"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- ##### Header Area End ##### -->

        <!-- ##### Breadcrumb Area Start ##### -->
        <div class="breadcrumb-area">
            <!-- Top Breadcrumb Area -->
            <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url(img/7.webp);">
                <h2>Book Shop</h2>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Book Shop</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- ##### Breadcrumb Area End ##### -->

        <!-- ##### Shop Area Start ##### -->
        <section class="shop-page section-padding-0-100">
            <div class="container">
                <div class="row">
                    <!-- Shop Sorting Data -->
                    <div class="col-sm" >
                        <div>
                            <!-- Shop Page Count -->


                            <div class="row">
                                <!-- Sidebar Area -->


                                <!-- All Products Area -->
                                <div class="col-sm">
                                    <div class="shop-products-area">
                                        <div class="row">

 <?php
$element = $obj->get_books_html(0,$_GET['category']??null);?>



                                        </div>
                                    </div>


                                </div>


                            </div>
                        </div>
                    </div>
                </div>
        </section>
        <!-- ##### Shop Area End ##### -->

















        <!-- ##### Footer Area Start ##### -->
        <footer class="footer-area bg-img" style="background-image: ;">
            <!-- Main Footer Area -->
            <div class="main-footer-area">
                <div class="container">
                    <div class="row">

                        <!-- Single Footer Widget -->
                        <div class="col-sm">
                            <div class="single-footer-widget">
                                <div class="footer-logo mb-30">
                                    <a href="#"><img src="img/1.png" 
                                                     style="width:280px;height: 280px;margin-top:-95px;">
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Single Footer Widget -->
                        <div class="col-sm">
                            <div class="single-footer-widget">
                                <div class="widget-title">
                                    <h5>About us</h5>
                                </div>
                                <p>We are a site aim to facilitate knowing the location of books to help students acquire them, and out of our keenness to save students time and effort in the university environment .</p>
                                <div class="social-info">
                                    <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                                </div>

                            </div>
                        </div>

                        <!-- Single Footer Widget -->


                        <!-- Single Footer Widget -->
                        <div class="col-sm">
                            <div class="single-footer-widget">
                                <div class="widget-title">
                                    <h5>CONTACT</h5>
                                </div>
                                <div class="contact-information">
                                    <p><span>Phone:</span> (06) 560 0230</p>
                                    <p><span>Email:</span>islamicarts.fac@wise.edu.jo</p> 

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer Bottom Area -->
            <div class="footer-bottom-area">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="border-line"></div>
                        </div>
                        <!-- Copywrite Text -->

                        <!-- Footer Nav -->

                    </div>
                </div>
            </div>
        </footer>

        <!-- ##### Footer Area End ##### -->

        <!-- ##### All Javascript Files ##### -->
        <!-- jQuery-2.2.4 js -->
        <script src="js/jquery/jquery-2.2.4.min.js"></script>
        <!-- Popper js -->
        <script src="js/bootstrap/popper.min.js"></script>
        <!-- Bootstrap js -->
        <script src="js/bootstrap/bootstrap.min.js"></script>
        <!-- All Plugins js -->
        <script src="js/plugins/plugins.js"></script>
        <!-- Active js -->
        <script src="js/active.js"></script>
        <script src="https://kit.fontawesome.com/cb20288b54.js" crossorigin="anonymous"></script>

    </body>

</html>