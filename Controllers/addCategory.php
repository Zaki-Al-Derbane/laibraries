<?php
session_start();
if(!isset($_SESSION['em'])){
    header('Location: login.php');
}

class AddCategory{
    public mysqli|null|false $conn = null;

    public function __construct(public ?string $categoryTitle=null)
    {
        $this->conn = mysqli_connect("localhost", "root", "", "library")
        or
        die ("Error of connection");
        $this->categoryTitle=$_POST['category_title'];
        $this->insertCategory();
    }

    private function insertCategory():void {
        $sql="INSERT INTO `categories` (`title`) VALUES ('{$this->categoryTitle}')";
        if ($query=mysqli_query($this->conn,$sql)){
            header("Location: ../categories.php");
        }else {
            echo mysqli_error($this->conn);
        }
    }
}

(new AddCategory());