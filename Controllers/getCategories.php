<?php

class getCategories
{
    private mysqli|false $conn;

    public function __construct()
    {
        $this->conn = mysqli_connect("localhost", "root", "", "library")
        or
        die ("Error of connection");
    }
    public function all(): array
    {
        $query = "select * from categories";
        $run = mysqli_query($this->conn,$query);
       $result=  mysqli_fetch_all($run);
       return $result;
    }
}
