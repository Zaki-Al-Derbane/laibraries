 <?php   
 include 'method/db.php';  
 $query = "select * from categories";
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
    <title>CATEGORIS</title>

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
        <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="
        background-image: url(img/12.png);">
            <h2>CATEGORIES</h2>
        </div>

        <div class="container"  >
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">CATEGORIES</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->
    <div class="container ">
        <div class="row">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#CategoryModal">
                Add Category
            </button>
            <div class="modal fade" id="CategoryModal" tabindex="-1" aria-labelledby="CategoryModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="CategoryModalLabel">New Category</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form id="categoryForm" class="p-5" action="Controllers/addCategory.php" method="POST">
                            <div class="form-group">
                                <label for="category_title">Category Title</label>
                                <input type="text" class="form-control" id="category_title" name="category_title">
                            </div>

                        </form>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" form="categoryForm">Add</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

<!-- START TABLE -->
    <div class="container" style="margin-top: 27.7px">
<table class="table table-bordered table-hover">
      <tr>
           <th class="text-center">ID</th>
           <th class="text-center">Category Title</th>
           <th class="text-center">Actions</th>
      </tr>
      <?php
      $i=1;  
           if ($num = mysqli_num_rows($run)>0) {  
                while ($result = mysqli_fetch_assoc($run)) {  
                     echo "  
                          <tr class='data' >  
                               <td>".$result['id']."</td>  
                               <td>".$result['title']."</td>
                               <td><a href='Controllers/deleteCategory.php?id=".$result['id']."' class='btn btn-danger'>Delete</a>";
                     echo <<<HTML
 <button type="button" class="btn btn-success" data-toggle="modal" data-target="#EditCategoryModal{$result['id']}">
                Edit
            </button>
            <div class="modal fade" id="EditCategoryModal{$result['id']}" tabindex="-1" aria-labelledby="EditCategoryModal{$result['id']}Label" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="EditCategoryModal{$result['id']}Label">Edit Category</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form id="EditCategoryForm{$result['id']}" class="p-5" action="Controllers/editCategory.php" method="POST">
                            <div class="form-group">
                                <label for="category_title">Category Title</label>
                                <input type="text" class="form-control" value="{$result['title']}" id="category_title" name="category_title">
                                <input type="hidden" class="form-control" value="{$result['id']}" name="id">
                            </div>
                        </form>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" form="EditCategoryForm{$result['id']}">Edit</button>
                        </div>
                    </div>
                </div>
            </div>
HTML;
                      echo "</td></tr>";
                }  
           }  
      ?>  
 </table>
    </div>
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