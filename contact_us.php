<?php
session_start();
    include 'method/db.php';

if (isset($_POST["submit"])) {

    $sql = "INSERT INTO contact (name, email,subject,phone,message)
VALUES ('" . $_POST["name"] . "','" . $_POST["email"] . "','" . $_POST["subject"] . "',
'" . $_POST["phone"] . "','" . $_POST["message"] . "')";

    if ($conn->query($sql) === TRUE) {
        echo "<script type= 'text/javascript'>
        alert('تم ارسال رسالتك بنجاح ... شكرا لك على نصيحتك');
    </script>
    ";
    } else {
        echo "<script type= 'text/javascript'>
        alert('Error: " . $sql . "<br>" . $conn->error . "');
    </script>";
    }

    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="description" content="">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

        <!-- Title -->
        <title>Contact Us</title>

        <!-- Favicon -->
        <link rel="icon" href="img/1.png">

        <!-- Core Stylesheet -->
        <link rel="stylesheet" href="style.css">
        <style>
            input::-webkit-outer-spin-button,
            input::-webkit-inner-spin-button {
                -webkit-appearance: none;
                margin: 0;
            }
        </style>

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
                            <a href="" class="nav-brand"><img src="img/1.png" style="width: 255px;
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
                                    <ul>
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
/*if (isset($_SESSION['em'])) {
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
            <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url(img/9.png);">
                <h2>Contact US</h2>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Contact</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- ##### Breadcrumb Area End ##### -->

        <!-- ##### Contact Area Info Start ##### -->
        <div class="contact-area-info section-padding-0-100">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <!-- Contact Thumbnail -->
                    <div class="col-12 col-md-6">

                        <img src="img/10.png" alt="" >

                    </div>

                    <div class="col-12 col-md-5">
                        <!-- Section Heading -->

                        <div class="section-heading">
                            <h2>CONTACT US</h2>
                            <p>We are improving our services to serve you better.</p>
                        </div>
                        <!-- Contact Information -->
                        <div class="contact-information">
                            <p><span>Phone:</span> (06) 560 0230</p>
                            <p><span>Email:</span> islamicarts.fac@wise.edu.jo</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- ##### Contact Area Info End ##### -->

        <!-- ##### Contact Area Start ##### -->
        <section class="contact-area">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-12 col-lg-5">
                        <!-- Section Heading -->
                        <div class="section-heading">
                            <h2>GET IN TOUCH</h2>
                            <p>Send us a message, we will call back later</p>
                        </div>
                        <!-- Contact Form Area -->
                        <div class="contact-form-area mb-100">
                            <form action="#" method="post">
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="contact-name" placeholder="Your Name" name="name"required>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <input type="email" class="form-control" id="contact-email" placeholder="Your Email"
                                                   name="email" required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="contact-subject" placeholder="Subject"name="subject" required>
                                            <input type="number" class="form-control" id="contact-subject" placeholder="Phone"name="phone"required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <textarea class="form-control" name="message" id="message" cols="30" rows="10" maxlength="150" placeholder="Message"name="message" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn alazea-btn mt-15" name="submit">Send Message</button>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-12 col-lg-6">
                        <!-- Google Maps -->
                        <div class="map-area mb-100" >
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3383.101428843354!2d35.93784942080547!3d32.01236608130163!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x151b6037d70a02f5%3A0x422b60b0d9a86253!2z2KzYp9mF2LnYqSDYp9mE2LnZhNmI2YUg2KfZhNil2LPZhNin2YXZitipINin2YTYudin2YTZhdmK2Kk!5e0!3m2!1sar!2sjo!4v1615308286585!5m2!1sar!2sjo"  allowfullscreen loading="lazy" 
                                    ></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ##### Contact Area End ##### -->

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
    </body>

</html>