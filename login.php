<?php
include 'method/core.php';
if (isset($_SESSION['em'])){
    header('Location:admin.php');
}
$obj= new Plant();
if (isset($_POST["btn"])){
    $email=$_POST["email"];
    $pass=$_POST["password"];
    $obj->login_user(array($email,$pass));
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="generator" content="">
    <title>Signin</title>

<link rel="icon" href="img/1.png">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    



    <style>
        html,
body {
  min-height: 100%;
  min-width: 100%;
}

body {
  background-image: url(img/EXDBzK1XQAEihE8.jpg);
  font-family: 'Quicksand', sans-serif;
  font-weight: 400;
/*  background-repeat: no-repeat;*/
}

.login {
  background: rgba(0, 0, 0, 0.7);
  color: #ffffff;
  border-radius: 150px 0px 150px 0px;
}

.form-group .form-control {
  background-color: transparent;
  padding: 25px 15px;
  color: #ffffff;
  border-color: green;
}

.form-control:focus {
  background-color: rgba(0, 0, 0, 0.3);
  border-color: green;
}

.btn-btc {
  color: #fff;
  background-color:rgba(51, 170, 51, .5) ;
  padding: 10px 25px;
  font-size: 15px;
}

.btn-btc:hover {
  color: #ffffff;
  background-color: rgba(51, 170, 51, .9) ;
}

input::-webkit-input-placeholder {
  color: white !important;
}

input:-moz-placeholder {
  /* Firefox 18- */
  color: white !important;
}

input: :-moz-placeholder {
  /* Firefox 19+ */
  color: white !important;
}

input:-ms-input-placeholder {
  color: white !important;
}
        }
    </style>
    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
</head>
<body class="text-center">


    <section class="form-block py-5">
  <div class="container">
    <div class="row">
      <div class="col-lg-5 col-md-7 col-sm-12 mx-auto">
        <div class="login shadow py-5 px-4 my-5">
          <div class="title text-right py-3">
            <h3 class="font-weight-bold">Login Form</h3>
          </div>
          <form class="py-4" method="post" action="">
            <div class="form-group mb-4">
              <input type="email" class="form-control rounded-pill shadow-none" id="exampleInputEmail" placeholder="Enter email" name="email">
            </div>
            
            <div class="form-group mb-4">
              <input type="password" class="form-control rounded-pill shadow-none" id="exampleInputPassword" placeholder="Password" name="password">
            </div>
            <button type="submit" class="btn btn-btc font-weight-bold shadow-none"><a href="index.php" style="color:white;">Back</a></button>
            <button type="submit" class="btn btn-btc font-weight-bold shadow-none" name="btn">Login</button>
           
                    
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

</body>
</html>
