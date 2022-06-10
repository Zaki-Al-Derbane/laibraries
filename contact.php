<?php
session_start();

include 'method/core.php';
$obj = new Plant();

if(!isset($_SESSION['em'])){
    header('Location: login.php');
}
if (isset($_POST['btn'])){
    $name=$_POST['nameE'];
    $price=$_POST['price'];
    $email=$_SESSION['em'];
    $description = $_POST["description"];

    $img_name=$_FILES['image']['name'];
    $img_size=$_FILES['image']['size'];
    $img_tmp=$_FILES['image']['tmp_name'];
    $img_ext=pathinfo($img_name, PATHINFO_EXTENSION);//strtolower(end(explode('.',$img_name)));

    $valid_ext=array('jpg','png','jpeg');
    if(!in_array($img_ext,$valid_ext)){
        $error[image]="error of extension";
    }elseif($img_size>2000000000000){
        $error[image]="size to large";
    }else {
        $img_name=time().'.'.$img_name;
        move_uploaded_file($img_tmp,"imag/".$img_name);

    }

    $obj->add_element(array($name,$price,$email,$img_name,$description));
}
?>