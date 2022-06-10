<?php
session_start();

include 'method/core.php';
include 'Controllers/getCategories.php';
$obj = new Plant();

$has_errors_flag=false;

if(!isset($_SESSION['em'])){
    header('Location: login.php');
}

unset($_SESSION['success']);

if (isset($_POST['btn'])){
    $email=$_SESSION['em'];

    $name=$_POST['nameE'];
    $price=$_POST['price'];
    $category_id=$_POST['category_id'];
    $description = $_POST["description"]??"";
    $location = $_POST["location"];

    $img_name=$_FILES['image']['name'];
    $img_size=$_FILES['image']['size'];
    $img_tmp=$_FILES['image']['tmp_name'];
    $img_ext=pathinfo($img_name, PATHINFO_EXTENSION);//strtolower(end(explode('.',$img_name)));
    if ($img_name) {
        $valid_ext = array('jpg', 'png', 'jpeg');
        if (!in_array($img_ext, $valid_ext)) {
            $error["image_extension"] = "error of extension";
            $has_errors_flag = true;
        } elseif ($img_size > 2000000000000) {
            $error["image_size"] = "size to large";
            $has_errors_flag = true;
        } else {
            $img_name = time() . '.' . $img_name;
            move_uploaded_file($img_tmp, "imag/" . $img_name);
        }
    }
    $file_name=$_FILES['file']['name'];
    $file_size=$_FILES['file']['size'];
    $file_tmp=$_FILES['file']['tmp_name'];
    $file_ext=pathinfo($file_name, PATHINFO_EXTENSION);//strtolower(end(explode('.',$img_name)));
    if ($file_name) {
    $valid_ext=array('docx','dox','pdf');
    if(!in_array($file_ext,$valid_ext)){
        $error["file_extension"]="error of extension";
        $has_errors_flag=true;
    }elseif($file_size>2000000000000){
        $error["file_size"]="size to large";
        $has_errors_flag=true;
    }else {
        $file_name=time().'.'.$file_name;
        move_uploaded_file($file_tmp,"files/".$file_name);
    }
    }

     unset($_SESSION["success"]);
    if (!$has_errors_flag) {
        $obj->add_element($name,$price,$email,$img_name,$file_name,$location,$description,$category_id);
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
    <title>Add Book</title>

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
                  <a href="" class="nav-brand"><img src="img/core-img/logo8.png" style="width: 255px; height:224px;">
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
<li><a href="suggestions.php">suggestions</a></li>
<li><a href="categories.php">categories</a></li>
<li><a href="#">Shop</a>
<ul class="dropdown">
<li><a href="shop.php">Book Shop</a></li>

</ul>
</li>


<li><a href="contact_us.php">Contact</a></li>
<li><a href="#">Admin</a>
<ul class="dropdown">
<li>
  <a href="logout.php"><i class="fas fa-sign-out-alt"></i><b> log-Out </b></a>
</ul>
</li>
</ul>
</div>
<!-- Navbar End -->
                    </div>
                </nav>


            </div>
            </div>
        </div>
    </div>
</header>
<!-- ##### Header Area End ##### -->

<!-- ##### Breadcrumb Area Start ##### -->
<div class="breadcrumb-area">
    <!-- Top Breadcrumb Area -->
    <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url(img/bg-img/admin.jpeg); height: 200px;">
    </div>

    <center><h1 class="h2 mb-3 " style="margin-top: 10px; display: flex; border-bottom: #28a745 solid 4px; max-width: fit-content;">ADD NEW BOOKS
         </h1></center>
    <div class="row">

        <div class="col-md-1"></div>
        <div class="col-md-10">
            <?php if(isset($_SESSION['success'])){ ?>
            <div class="alert alert-success text-center">
                <?php echo $_SESSION['success'] ?>
            </div>
            <?php } ?>
            <form method="post" id="myForm" enctype="multipart/form-data">
                <div class="form-row">
                    <div class="form-group">
                        <label for="category">Book Category</label>
                        <select class="form-control" id="category" name="category_id">
                            <?php foreach ((new getCategories())->all() as $category){
                                echo <<<ZAKI
                       <option value="{$category[0]}">{$category[1]}</option>
ZAKI;
                            }
                            ?>
                        </select>
                    </div>
                </div>
                    <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="">Book Name</label>
                        <input type="text" class="form-control" style="form-control:placeholder{color:blue }"
                               name="nameE"
                               placeholder="Insert Name ..."
                               value="<?php
                               echo ''.($name ?? '').''
                               ?>" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Email</label>
                        <input type="email" class="form-control"
                               name="email" disabled   value="<?php
                        echo ''.$_SESSION['em'].''?>">
                    </div>
                </div>
                              <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputCity">Book Price</label>
                        <input type="number" class="form-control"
                               name="price"  id="price"
                               value="<?php
                               echo ''.($price??"").''
                               ?>"
                               placeholder="&nbsp;&nbsp;JD">
                    </div>
                      <div class="form-group col-md-6">

                        <label for="inputCity">Library Location </label>
<input type="text" class="form-control" name="location" id="location"
       value="<?php
       echo ''.($location??"").''
       ?>" placeholder="Library Location" <?php echo ($price??null)?"required":"" ?> >

                    </div>

                    <div class="form-group col-md-6">
                        <label for="inputZip">Book image</label>
                        <input type="file" class="form-control" name="image" required>
                        <span class="text-danger text-sm-left">
                            <?php echo isset($error["image_extension"])?$error["image_extension"]:"" ?>
                            <?php echo isset($error["image_size"])?$error["image_size"]:"" ?>
                        </span>
                    </div>

                       <div class="form-group col-md-6">
                        <label for="inputZip">Book File</label>
                        <input type="file" class="form-control" name="file" >
                           <span class="text-danger text-sm-left">
                            <?php echo isset($error["file_extension"])?$error["file_extension"]:"" ?>
                            <?php echo isset($error["file_size"])?$error["file_size"]:"" ?>
                        </span>
                    </div>
                         <div class="form-group">
                            <label for="exampleFormControlTextarea3">Book Description</label>
                            <textarea class="form-control"
                                      name="description"
                                      id="exampleFormControlTextarea3"
                                      dir="auto" cols="73"><?php echo $description??"" ?></textarea>
                        </div>
                </div>

                <button type="submit" id="btn" onclick="" class="btn btn-success col-md-12 mb-5" name="btn"><b>ADD BOOK</b></button>


        </div>
            </form>
        </div>
        <div class="col-md-1"></div>

    </div>


</div>



<!-- ##### Breadcrumb Area End ##### -->

<!-- ##### Shop Area End ##### -->

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
<script>
    $(document).ready(function (){
        $("#price").on("input",function (){
            let price = $(this).val();
            console.log( price.length);
            if (price.length >=1)
                $("#location").attr("required","on")
            else
                $("#location").removeAttr("required")
        });
    });
</script>
</body>

</html>