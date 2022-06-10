 <?php   
 include 'method/db.php';  
 $query = "select * from contact";  
 $run = mysqli_query($conn,$query);  
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
    <title>Suggestions</title>

    <!-- Favicon -->
    <link rel="icon" href="img/1.png">

    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>


<style >

  .data{  
      text-align: center;  
      
 }  
 .data td{  
      padding: 15px 0; 

 } 
 #btn{  
      text-decoration: none;  
      color: #FFF;  
      background-color: #e74c3c;  
      padding: 5px 20px;  
      border-radius: 3px;  
 }  
 #btn:hover{  
      background-color: #c0392b;  
 }
</style>
</head>

<body>
    <!-- Preloader -->
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class=""></div>
        <div class="">
            <img src="1.png" alt="">
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

<li><a href="#">Admin</a>
<ul class="dropdown">
<li><a href="login.php">    
<?php
if( isset($_SESSION['em']) )
{
echo 'login';
}
else 
{
echo 'profile';
}
?>       
</a>

</ul>
</li>

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
        <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url(img/11.jpg);">
            <h2>Suggestions</h2>
        </div>

        <div class="container"  >
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Suggestions</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->

    
<br><br><br><br><br>
<!-- START TABLE -->
<table border="1" cellspacing="0" cellpadding="0" style="width: 90%;
    position: relative;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);">  
      <tr class="heading" style="      
background-color: #FFFF;
text-align: center;    

">  
             
           <th style=" padding: 10px 0;">ID</th>  
           <th style=" padding: 10px 0;">Name</th>  
           <th style=" padding: 10px 0;">Email</th>  
           <th style=" padding: 10px 0;">Subject</th>  
           <th style=" padding: 10px 0;">Phone</th>  
           <th style=" padding: 10px 0;">Message</th>  
           <th style=" padding: 10px 0;">Operation</th>  
      </tr>  
      <?php   
      $i=1;  
           if ($num = mysqli_num_rows($run)>0) {  
                while ($result = mysqli_fetch_assoc($run)) {  
                     echo "  
                          <tr class='data' >  
                            
                               <td>".$result['id']."</td>  
                               <td>".$result['name']."</td>  
                               <td>".$result['email']."</td>  
                               <td>".$result['subject']."</td>  
                               <td>".$result['phone']."</td>  
                               <td>".$result['message']."</td>  
                               <td><a href='delete.php?id=".$result['id']."' id='btn'>Delete</a></td>  
                          </tr>  
                     ";  
                }  
           }  
      ?>  
 </table> 

<!-- END TABLE -->










  

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
                    <!--         <div class="social-info">
                                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                            </div> -->

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