<?php

class deleteCategory
{
    public mysqli|null|false $conn = null;

    public function __construct(public string|int|null $categoryId=null)
    {
        $this->conn = mysqli_connect("localhost", "root", "", "library")
        or
        die ("Error of connection");
        $this->categoryId=$_GET['id'];
        $this->deleteCategory();
    }

    private function deleteCategory()
    {
        $id = $_GET['id'];
        $query = "DELETE FROM `categories` WHERE id = '{$this->categoryId}'";
        $run = mysqli_query($this->conn,$query);
        if ($run) {
            header('location:../categories.php');
        }else{
            echo "Error: ".mysqli_error($this->conn);
        }
    }

}

(new deleteCategory());