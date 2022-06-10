<?php
session_start();


include "method/core.php";
$obj = new Plant();

$id=$_GET['id'];
$obj->return_blog_id($id);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>Post</title>

    <!-- Favicon -->
    <link rel="icon" href="imag/logo.png">

    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="style.css">

</head>

<body>
<!-- Preloader -->
<div class="preloader d-flex align-items-center justify-content-center">
    <div class="preloader-circle"></div>
    <div class="preloader-img">
        <img src="img/core-img/leaf.png" alt="">
    </div>
</div>

<!-- ##### Header Area Start ##### -->
<header class="header-area">

    <!-- ***** Top Header Area ***** -->
    <div class="top-header-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="top-header-content d-flex align-items-center justify-content-between">
                        <!-- Top Header Content -->
                        <div class="top-header-meta">
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title=""><i class="fa fa-envelope-o" aria-hidden="true"></i> <span>Email: wise@wise.com</span></a>
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="+1 234 122 122"><i class="fa fa-phone" aria-hidden="true"></i> <span>Call Us: +1 234 122 122</span></a>
                        </div>

                        <!-- Top Header Content -->
                        <div class="top-header-meta d-flex">

                            <!-- Login -->
                            <div class="login">
                                <a href="login.php"><i class="fa fa-user" aria-hidden="true"></i> <span>Login</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ***** Navbar Area ***** -->
    <div class="alazea-main-menu">
        <div class="classy-nav-container breakpoint-off">
            <div class="container">
                <!-- Menu -->
                <nav class="classy-navbar justify-content-between" >

                    <!-- Nav Brand -->
                    <a href="index.php" class="nav-brand"><img src="imag/logo.png" style="width:80px;height: 75px;" alt=""></a>

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
                                <li><a href="shop.php">Shop</a></li>
                                <li><a href="blog.php">Blog</a></li>
                                <li><a href="contact.php">Contact</a></li>
                            </ul>

                            <!-- Search Icon -->
                            <div id="searchIcon">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </div>

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
    <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url(img/bg-img/24.jpg);">
        <h2>SINGLE BLOG POST</h2>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Blog</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Single Blog Post</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- ##### Breadcrumb Area End ##### -->

<!-- ##### Blog Content Area Start ##### -->
<section class="blog-content-area section-padding-0-100">
    <div class="container">
        <div class="row justify-content-center">
            <!-- Blog Posts Area -->
            <div class="col-12 col-md-8">
                <div class="blog-posts-area">

                    <!-- Post Details Area -->
                    <div class="single-post-details-area">
                        <?php
                       $blog=$obj->return_blog_id(array($_GET['id']));
                       for ($i=0;$i<(count($blog['id']));$i++){
                           echo '
                              <div class="post-content">
                            <h4 class="post-title">'.$blog['name'][$i].'</h4>
                            <div class="post-thumbnail mb-30">
                                <img src="imag/'.$blog['image'][$i].'" alt="">
                            </div>
                            <p>'.$blog['desc'][$i].'</p>



                        </div>
                           ';
                       }
                        ?>

                    </div>

                </div>
            </div>

            <!-- Blog Sidebar Area -->
            <div class="col-12 col-sm-9 col-md-4">
                <div class="post-sidebar-area">





                    <!-- ##### Single Widget Area ##### -->
                    <div class="single-widget-area">
                        <!-- Title -->
                        <div class="widget-title">
                            <h4>Recent post</h4>
                        </div>

                        <!-- Single Latest Posts -->


                            <?php
                            $blogg=$obj->return_blog();
                            for ($i=0;$i<count($blogg['id']);$i++){
                                if ($i==5) break;
                                echo '
                        <div class="single-latest-post d-flex align-items-center">
                                  <div class="post-thumb">
                                <img src="imag/'.$blogg['image'][$i].'" alt="">
                            </div>
                            <div class="post-content">
                                <a href="single-post.php?id='.$blogg['id'][$i].'" class="post-title">
                                    <h6>'.$blogg['name'][$i].'</h6>
                                </a>
                            </div>
                            
                        </div>
                                ';
                            }
                            ?>



                    </div>








                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### Blog Content Area End ##### -->

<!-- ##### Footer Area Start ##### -->
<footer class="footer-area bg-img" style="background-image: url(img/bg-img/3.jpg);">
    <!-- Main Footer Area -->
    <div class="main-footer-area">
        <div class="container">
            <div class="row">

                <!-- Single Footer Widget -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-footer-widget">
                        <div class="footer-logo mb-30">
                            <a href="index.php"><img src="imag/logo.png" style="width:80px;height: 75px;" alt=""></a>
                        </div>
                        <p>We are leading in the plants service.

                            A group of students we created this website to provide services and improve the ecosystem.</p>
                        <div class="social-info">
                            <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>


                <!-- Single Footer Widget -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-footer-widget">
                        <div class="widget-title">
                            <h5>BEST SELLER</h5>
                        </div>

                        <!-- Single Best Seller Products -->
                        <?php
                        $min=$obj->return_min();
                        for ($i=0;$i<(count($min['id']));$i++){
                            echo '
                             <div class="single-best-seller-product d-flex align-items-center">
                            <div class="product-thumbnail">
                                <img src="imag/'.$min['image'][$i].'" alt="">
                            </div>
                            <div class="product-info">
                                <a href="#">'.$min['name'][$i].'</a>
                                <p>'.$min['price'][$i].' jd</p>
                            </div>
                        </div>

                            ';
                        }
                        ?>


                    </div>
                </div>





                <!-- Single Footer Widget -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-footer-widget">
                        <div class="widget-title">
                            <h5>CONTACT</h5>
                        </div>

                        <div class="contact-information">
                            <p><span>Phone:</span> +1 234 122 122</p>
                            <p><span>Email:</span> wise@wise.com</p>

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
                <div class="col-12 col-md-6">
                    <div class="copywrite-text">
                        <p>&copy;
                            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://web.facebook.com/profile.php?id=100014897296179" target="_blank">YazanSuhail</a>
                        </p>
                    </div>
                </div>
                <!-- Footer Nav -->
                <div class="col-12 col-md-6">
                    <div class="footer-nav">
                        <nav>
                            <ul>
                                <li><a href="index.php">Home</a></li>
                                <li><a href="shop.php">Shop</a></li>
                                <li><a href="blog.php">Blog</a></li>
                                <li><a href="contact.php">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
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