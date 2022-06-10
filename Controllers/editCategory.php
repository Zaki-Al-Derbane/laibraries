<?php

class editCategory
{
    public mysqli|null|false $conn = null;

    public function __construct(public string|int|null $categoryId=null,public ?string $categoryTitle=null)
    {
        $this->conn = mysqli_connect("localhost", "root", "", "library")
        or
        die ("Error of connection");
        $this->categoryTitle=$_POST['category_title'];
        $this->categoryId=$_POST['id'];
        $this->insertCategory();
    }
    private function insertCategory():void {
        $sql="UPDATE `categories` SET title = '{$this->categoryTitle}' WHERE id = '{$this->categoryId}'";
        if ($query=mysqli_query($this->conn,$sql)){
            header("Location: ../categories.php");
        }else {
            echo mysqli_error($this->conn);
        }
    }
}

(new editCategory());