<?php
session_start();

include "method/core.php";
$obj = new Plant();

if (isset($_POST['btnC'])) {
    $email = $_POST['email'];
    $sub = $_POST['subject'];
    $message = trim($_POST['message']);
    if (!(filter_var($email, FILTER_VALIDATE_EMAIL)) && $email == "") {
        $error[] = "Check Your Email!!";
    } elseif (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $to = "wise@wise.com";
        $subject = $sub;
        $messA = $message;
        mail($to, $sub, $message);
    } else {
        foreach ($error as $a) {
            echo $a;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="description" content="">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


        <!-- Title -->
        <title>Graduation Project</title>
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
                            <a href="index.php" class="nav-brand">
                                <img src="img/1.png" style="width: 255px;
                                     height: 224px;"></a>

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
                                    <ul >
                                        <li><a href="index.php">Home</a></li>

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

                    </div>
                </div>
            </div>
        </header>
        <!-- ##### Header Area End ##### -->

        <!-- ##### Hero Area Start ##### -->
        <section class="hero-area">
            <div class="hero-post-slides owl-carousel">

                <!-- Single Hero Post -->
                <div class="single-hero-post bg-overlay">
                    <!-- Post Image -->
                    <div class="slide-img bg-img" style="background-image: url(img/bg-img/106.jpg);"></div>
                    <div class="container h-100">
                        <div class="row h-100 align-items-center">
                            <div class="col-12">
                                <!-- Post Content -->
                                <div class="hero-slides-content text-center">
                                    <h2 style="margin-top:-350px;
                                        ">Green pages bookstore </h2>

                                    <p class="musa" style="font-size: 30PX;">Welocme to Green Pages</p>

                                    <div class="welcome-btn-group">
                                        <a href="#about" class="btn alazea-btn mr-30" >About us</a>
                                        <a href="contact_us.php" class="btn alazea-btn active">CONTACT US</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Single Hero Post -->


            </div>
        </section>
        <!-- ##### Hero Area End ##### -->

        <!-- ##### Service Area Start ##### -->
        <div id="raed">
            <section class="our-services-area bg-gray section-padding-100-0">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <!-- Section Heading -->
                            <div class="section-heading text-center">
                                <h2>OUR SERVICES</h2>
                                <p>We provide the perfect service for you.</p>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-between">
                        <div class="col-12 col-lg-5">
                            <div class="alazea-service-area mb-100">

                                <!-- Single Service Area -->
                                <div class="single-service-area d-flex align-items-center wow fadeInUp" data-wow-delay="100ms">
                                    <!-- Icon -->
                                    <div class="service-icon mr-30">
                                        <img src="img/2.png" alt="">
                                    </div>
                                    <!-- Content -->
                                    <div class="service-content">
                                        <h5>Find out the location of the book .</h5>
                                        <p>Library locations .</p>
                                    </div>
                                </div>

                                <!-- Single Service Area -->
                                <div class="single-service-area d-flex align-items-center wow fadeInUp" data-wow-delay="300ms">
                                    <!-- Icon -->
                                    <div class="service-icon mr-30">
                                        <img src="img/3.png" alt="">
                                    </div>
                                    <!-- Content -->
                                    <div class="service-content">
                                        <h5>Find out the price of books .</h5>
                                        <p>Books prices .</p>
                                    </div>
                                </div>

                                <!-- Single Service Area -->
                                <div class="single-service-area d-flex align-items-center wow fadeInUp" data-wow-delay="500ms">
                                    <!-- Icon -->
                                    <div class="service-icon mr-30">
                                        <img src="img/4.png" alt="">
                                    </div>
                                    <!-- Content -->
                                    <div class="service-content">
                                        <h5>Saving time and effort</h5>
                                        <p>Quick search for a book .</p>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col-12 col-lg-6">
                            <div class="alazea-video-area bg-overlay mb-100">
                                <img src="img/5.png" alt="">

                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!-- ##### Service Area End ##### -->

        <!-- ##### About Area Start ##### -->
        <div id="about">
            <section class="about-us-area section-padding-100-0" style=" padding-top: 150px;" >
                <div class="container">
                    <div class="row justify-content-between">
                        <div class="col-12 col-lg-5">
                            <!-- Section Heading -->
                            <div class="section-heading text-center">
                                <h2>ABOUT US</h2>
                                <br>
                            </div>
                            <h5>We are the students of the <br>world Islamic science & education University (  W.I.S.E  ) <br> We took the initiative to create a website to facilitate knowing the location of books to help students acquire them, and out of our keenness to save students time and effort in the university environment  . </h5>

                        </div>




                        <div class="col-12 col-lg-6">

                            <img src="img/6.jpg" alt="">


                        </div>
                    </div>
                </div>
                <br><br><br><br><br>
                <div class="container">
                    <div class="row">
                        <div class="col-12 ">
                            <div class="border-line"></div>
                        </div>
                    </div>

            </section>
            <!-- ##### About Area End ##### -->
        </div>



        <!-- ##### Product Area Start ##### -->
        <section class="new-arrivals-products-area bg-gray section-padding-100">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- Section Heading -->
                        <div class="section-heading text-center">
                            <h2>Some of our Books</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- Product Image -->
                    <?php
                    $element = $obj->get_books_html(1);
                    /*if (count($element) > 0) {
                    $i = 0;
                        foreach($element as $li) {
                            if ($i <4){
                            echo '
<div class="col-12 col-sm-6 col-lg-3">
<div class="single-product-area mb-50">
<!-- Product Image -->
<div class="product-img">
<img src="imag/' . $li['image'] . '" style="width:100%;height:303px;">
</div>
<!-- Product Info -->
<div class="product-info mt-15 text-center">
<p>' . $li['name'] . '</p>
<div style="background-color: #70c745;">
<h6><b>' . $li['price'] . '&nbsp;&nbsp;JD</b></h6>
<h6><a href="" style="font-size: 17px;">' . $li['description'] . '</a>
</h6>
</div>
</div>
</div>
</div>
';
                        }
                        $i++;
                    }
                        echo '<div class="col-12 text-center">
                        <a href="shop.php" class="btn alazea-btn">View All Books</a>
                    </div>';
                    } else {
                        echo "There is no data yet";
                    }*/
                    ?>

                </div>
            </div>
        </section>
        <!-- ##### Product Area End ##### -->




        <!-- ##### Product Area Start ##### -->


        <!-- ##### Product Area End ##### -->





        <!-- ##### Contact Area Start ##### -->


        <!-- ##### Footer Area Start ##### -->
        <footer class="footer-area bg-img">
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