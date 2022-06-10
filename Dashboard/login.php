<?php
session_start();
include "../method/core.php";

if (isset($_SESSION['email'])){
    header('Location:Portfolio.php');
}

$obj=new Plant();

if (isset($_POST['btn'])){
    $email=$_POST['email'];
    $pass=$_POST['password'];

    $obj->login_admin(array($email,$pass));


}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Bootstrap Simple Login Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <style>
        .login-form {
            width: 340px;
            margin: 50px auto;
            font-size: 15px;
        }
        .login-form form {
            margin-bottom: 15px;
            background: #f7f7f7;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            padding: 30px;
        }
        .login-form h2 {
            margin: 0 0 15px;
        }
        .form-control, .btn {
            min-height: 38px;
            border-radius: 2px;
        }
        .btn {
            font-size: 15px;
            font-weight: bold;
        }
    </style>
</head>
<body style="background-image: url('../imag/slider_1.jpg');background-repeat:no-repeat;background-size:cover;">
<div class="login-form">
    <form action="" method="post">
        <img  src="../imag/logo.png" class="mb-3" width="248px" height="166px" style="margin-left: 10px">

        <div class="form-group">
            <input type="email" class="form-control" placeholder="Username" name="email" required="required">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" placeholder="Password" name="password" required="required">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block" name="btn">Log in</button>
        </div>

    </form>
</div>
</body>
</html>
