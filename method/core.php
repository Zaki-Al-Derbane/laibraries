<?php

use JetBrains\PhpStorm\ArrayShape;

if(!isset($_SESSION))
    { 
        session_start(); 
    } class Plant{
    public $hostname = "localhost";
    public $username = "root";
    public $pass = "";
    public $dbname = "library";
    public $conn = null;

    public function __construct()
    {
        $this->conn = mysqli_connect($this->hostname, $this->username, $this->pass, $this->dbname) or die ("Error of connection");
    }

    //-------------------اضافة مستخدمين-----------------
    function add_user($arr){
        $name=$arr[0];
        $email=$arr[1];
        $pass=$arr[2];
    
        $sql = "SELECT * FROM `user` WHERE `email` ='$email'";
        $query = mysqli_query($this->conn, $sql);
        if ($row=mysqli_fetch_array($query)) {
            echo '
           
                   <center><script>
                   alert(" ((ERROR)) This email already exists");
</script></center> 

            ';

        }else {

            $sql = "INSERT INTO `user`(`name`,`email`,`password`)VALUES('$name','$email','$pass')";
            if ($query = mysqli_query($this->conn, $sql)) {
                echo '
            <div class="alert alert-primary center" style="justify-content: center;display: flex;"  role="alert">
                   <center>Data has been added</center> 
</div>
            ';
            } else {
                echo mysqli_error($this->conn);
            }

        }
    }

    //-------------------عرض المستخدمين-----------------
    function users_return(){

        $sql="SELECT * FROM `user`";
        $query=mysqli_query($this->conn,$sql);
        while ($row=mysqli_fetch_array($query)){
            $li['id'][]=$row['id'];
            $li['email'][]=$row['email'];
         
            $li['name'][]=$row['name'];




        }
        return $li;

    }

    //-------------------تسجيل دخول البائع-----------------
    function login_user($arr){
        $email=$arr[0];
        $password=$arr[1];

        $sql="SELECT * FROM `user` WHERE `email`='$email' AND `password`='$password'";
        $query=mysqli_query($this->conn,$sql);
        if($row=mysqli_fetch_array($query)){
            $_SESSION['em'] = $row['email'];
            $_SESSION['password'] = $row['password'];


         echo '<script type="text/javascript">';
//echo 'alert("تمت عملية الدخول بنجاح");';
echo 'window.location.href = "admin.php";';
echo '</script>';
            exit;    }else{

                         echo '<script type="text/javascript">'; 
echo 'alert("ادخال خاطيء");';
echo 'window.location.href = "login.php";';
echo '</script>';
            $_SESSION['error']= "Invalid login, please try again";
        }

    }

    //-------------------تسجيل دخول لوحة التحكم-----------------
    function login_admin($arr){
        $email=$arr[0];
        $password=$arr[1];

        $sql="SELECT * FROM `admin` WHERE `email`='$email' AND `password`='$password'";
        $query=mysqli_query($this->conn,$sql);
        if($row=mysqli_fetch_array($query)){
            $_SESSION['email'] = $row['email'];
            $_SESSION['password'] = $row['password'];


            echo ''.header("Location: Portfolio.php").'';
            exit;    }else{
            $_SESSION['error']= "Invalid login, please try again";
        }

    }

    //-------------------استرجاع الاسعار الافظل-----------------
    function return_min(){
        $sql=" SELECT   
        max(`price`) AS price,
                `id` AS id,
             `name` AS name,
                      `image` AS image FROM `element`";
        $query=mysqli_query($this->conn,$sql);
        while ($row=mysqli_fetch_array($query)){
            $li['id'][]=$row['id'];
            $li['image'][]=$row['image'];
            $li['name'][]=$row['name'];
            $li['price'][]=$row['price'];
        }
        return $li;
    }


    //-------------------ادخال المشتريات للموقع-----------------
    function add_element(&$name,&$price,&$email,&$img_name,&$file_name,&$location,&$description,&$category_id){
        $sql="INSERT INTO `element` (`name`,`price`,`email`,`image`,`location`,`description`,`file`,`category_id`) VALUES ('$name','$price','$email','$img_name','$location','$description','$file_name','$category_id')";
        $name="";
        $price="";
        $email="";
        $img_name="";
        $file_name="";
        $description = "";
        $location = "";
        $category_id = "";
        if ($query=mysqli_query($this->conn,$sql)){
            $_SESSION['success'] = "تمت اضافة الكتاب بنجاح";
        }else {
            echo mysqli_error($this->conn);
        }


    }


    //-------------------عرض الايميلات للادمن-----------------
    function return_Email(){
        $sql= "SELECT * FROM `user`";
        $query = mysqli_query($this->conn,$sql);
        while ($row=mysqli_fetch_array($query)){
            $li['id'][]=$row['id'];
            $li['email'][]=$row['email'];
            $li['phone'][]=$row['phone'];
        }
        return $li;

    }

    //-------------------عرض اضافات المستخدمين-----------------
    function  return_Element_user($arr){
        $id=$arr[0];
        $sql="SELECT * FROM `element` WHERE `email`='$id'";
        $query=mysqli_query($this->conn,$sql);
        while ($row=mysqli_fetch_array($query)){
            $li['id'][]=$row['id'];
            $li['name'][]=$row['name'];
            $li['price'][]=$row['price'];
        }

        return $li;
    }


    //-------------------عرض اضافات المستخدمين-----------------
    public function get_books_query(int $limit): array
    {
        if ($limit >=1 ) {
            $sql="SELECT * FROM `element` ORDER BY RAND() LIMIT ".$limit;
        }else {
            $sql="SELECT * FROM `element`";
        }
        $query=mysqli_query($this->conn,$sql);
        return mysqli_fetch_all($query);
    }

    public function get_books_query_by_category(mixed $category): array
    {
        $sql="SELECT * FROM `element` WHERE category_id='$category'";
        $query=mysqli_query($this->conn,$sql);
        return mysqli_fetch_all($query);
    }


    public function get_books_html(bool $isHome=false,mixed $category=null): void
    {
        if ($isHome && !$category)
        $books=$this->get_books_query(limit:6);
        elseif (!$isHome && !$category)
        $books=$this->get_books_query(limit:-1);
        elseif (!$isHome && $category)
        $books=$this->get_books_query_by_category($category);

        if (count($books) == 0) {
            echo "There is no data yet";
        }else{
            foreach ($books as $book) {
               echo $this->getBookCard(
                   Location:$this->getLocationLink($book[8]),
                   downloadFile: $this->getDownloadFile($book[4],$book[7]),
                   Description:$this->getDescription(
                       id: $book[0],bookName: $book[2],Description:$book[6]
                   ),
                   price: $book[4],
                   image: $book[5],
                   bookName:$book[2]
               );
            }
        }
    }



    function  return_Element_shop(){
        $li = array();
        $sql="SELECT * FROM `element`";
        $query=mysqli_query($this->conn,$sql);
//        return mysqli_fetch_all($query);

        while ($row=mysqli_fetch_array($query)){
            array_push($li, array(
"id"=> $row["id"],
'name'=>$row['name'],
            'price'=>$row['price'],
            'image'=>$row['image'],
            'email'=>$row['email'],
            'location'=>$row['location'],
            'file'=>$row['file'],
            'description'=>$row['description']
            ));
           /* $li['id']=$row['id'];
            $li['name']=$row['name'];
            $li['price']=$row['price'];
            $li['image']=$row['image'];
            $li['email']=$row['email'];
            $li['description']=$row['description'];*/
        }
        return $li;
    }
function  return_Element_tool(){
        $sql="SELECT * FROM `element` where `type` = 2";
        $query=mysqli_query($this->conn,$sql);
        while ($row=mysqli_fetch_array($query)){
            $li['id'][]=$row['id'];
            $li['name'][]=$row['name'];
            $li['price'][]=$row['price'];
            $li['image'][]=$row['image'];
            $li['email'][]=$row['email'];
        }

        return $li;
    }
    //-------------------اضافات مقالات-----------------
    function  add_blog($arr){
        $name=$arr[0];
        $img=$arr[2];
        $blog=$arr[1];

        $sql="INSERT INTO `blog` (`name`,`description`,`image`) VALUES ('$name' ,'$blog', '$img')";
        if ($query=mysqli_query($this->conn,$sql)){
            echo'
            <div class="alert alert-primary center" style="justify-content: center;display: flex;"  role="alert">
                   <center>Blog has been added</center> 
</div>
            ';
        }else {
            echo mysqli_error($this->conn);
        }
    }

    //-------------------عرض المقالات-----------------
    function  return_blog(){
        $sql="SELECT * FROM `blog`";
        $query=mysqli_query($this->conn,$sql);
        while ($row=mysqli_fetch_array($query)){
            $li['id'][]=$row['id'];
            $li['name'][]=$row['name'];
            $li['desc'][]=$row['description'];
            $li['image'][]=$row['image'];
 return $li;
        }

       
    }

    //-------------------عرض المقالات حسب ال id-----------------
    function  return_blog_id($arr){
        $id=$arr[0];
        $sql="SELECT * FROM `blog` WHERE `id` = '$id'";
        $query=mysqli_query($this->conn,$sql);
        while ($row=mysqli_fetch_array($query)){
            $li['id'][]=$row['id'];
            $li['name'][]=$row['name'];
            $li['desc'][]=$row['description'];
            $li['image'][]=$row['image'];

        }

        return $li;
    }

    //-------------------حذف العناصر المستخدمين-----------------
    function  delete_user($arr){
        $id=$arr[0];
        $sql="DELETE FROM `user` WHERE `id` = '$id'";
       if ($query=mysqli_query($this->conn,$sql)){
           echo'
            <div class="alert alert-primary center" style="justify-content: center;display: flex;"  role="alert">
                   <center>User has been deleted</center> 
</div>
            ';
       }else {
           echo mysqli_error($this->conn);
       }

    }

    //-------------------عرض المستخدمين حسب ال id-----------------
    function  return_user_update($arr){
        $id=$arr[0];
        $sql="SELECT * FROM `user` WHERE `id` = '$id'";
        $query=mysqli_query($this->conn,$sql);
        while ($row=mysqli_fetch_array($query)){
            $li['id'][]=$row['id'];
            $li['email'][]=$row['email'];
            $li['address'][]=$row['Address'];
            $li['city'][]=$row['city'];
            $li['password'][]=$row['password'];
            $li['phone'][]=$row['phone'];

        }
        return $li;
    }

    //------------------- تعديل عل المستخدمين-----------------

    function update_user($arr){
        $email=$arr[0];
        $pass=$arr[1];
        $add=$arr[2];
        $city=$arr[3];
        $phone=$arr[4];
        $id=$arr[5];

        $sql="UPDATE `user` SET `email` = '$email',`password`= '$pass', `Address` = '$add' , `city` = '$city' , `phone` = '$phone'  WHERE `id` = '$id' ";
        if ($query=mysqli_query($this->conn,$sql)){
            echo'
            <div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
  <strong>تم تعديل</strong> .جميع بيانات في الملف الشخصي شكرا لك
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
            ';
        }else {
            echo mysqli_error($this->conn);
        }

    }
    //------------------- حذف العناصر -----------------

    function deleteElement($arr){
        $id=$arr[0];
        $sql="DELETE FROM `element` WHERE `id`='$id'";
        if ($query=mysqli_query($this->conn,$sql)){
            echo'
            <div class="alert alert-primary center" style="justify-content: center;display: flex;"  role="alert">
                   <center>Element has been deleted</center> 
</div>
            ';
        }else {
            echo mysqli_error($this->conn);
        }

    }

    //------------------- حذف blog -----------------

    function deleteBlog($arr){
        $id=$arr[0];
        $sql="DELETE FROM `blog` WHERE `id`='$id'";
        if ($query=mysqli_query($this->conn,$sql)){
            echo'
            <div class="alert alert-primary center" style="justify-content: center;display: flex;"  role="alert">
                   <center>Blog has been deleted</center> 
</div>
            ';
        }else {
            echo mysqli_error($this->conn);
        }

    }
    //-------------------عرض Blog حسب ال id-----------------


    function returnBlog($arr){
    $id=$arr[0];
        $sql="SELECT * FROM `blog` WHERE `id` = '$id'";
        $query=mysqli_query($this->conn,$sql);
        while ($row=mysqli_fetch_array($query)){
            $li['id'][]=$row['id'];
            $li['name'][]=$row['name'];
            $li['description'][]=$row['description'];


        }
        return $li;

    }

    //------------------- Contact Us    -----------------

/*        function contactus($arr){
        $name=$arr[0];
        $email=$arr[1];
        $subject=$arr[2];
        $phone=$arr[3];
        $message = $arr[4];
        $sql="INSERT INTO `contact` (`name`,`email`,`subject`,`phone`,`message`) VALUES ('$name','$email','$subject','$phone','$phone')";
        if ($query=mysqli_query($this->conn,$sql)){

        }else {
            echo mysqli_error($this->conn);
        }


    }
*/
    //---------------------------------------------------

    //------------------- تعديل عل Blog-----------------

    function update_Blog($arr){
        $name=$arr[0];
        $blog=$arr[1];
        $img=$arr[2];
        $id=$arr[3];


        $sql="UPDATE `blog` SET `name` = '$name',`description`= '$blog', `image` = '$img'   WHERE `id` = '$id' ";
        if ($query=mysqli_query($this->conn,$sql)){
            echo'
            <div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
  <strong>تم تعديل</strong> .جميع بيانات في الملف الشخصي شكرا لك
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
            ';
        }else {
            echo mysqli_error($this->conn);
        }

    }


    //------------------- تعديل عل Blog-----------------




    function register($arr)
    {
        $name = $arr[0];
        $email = $arr[1];
        $pass = $arr[2];
     
        $sql = "SELECT * FROM `user` WHERE `email` ='$email'";
        $query = mysqli_query($this->conn, $sql);
        if ($row=mysqli_fetch_array($query)) {
            echo '
           
                   <center><script>
                   alert(" ((ERROR)) This email already exists");
</script></center> 

            ';

        } else {

            $sql = "INSERT INTO `user`(`name`,`email`,`password`)VALUES('$name','$email','$pass')";
            if ($query = mysqli_query($this->conn, $sql)) {
                echo
                '   
                   <center style="background-color: red"><script>
                   alert("Data has been added ")
                   ; 
                   location.assign("login.php");
</script></center> 


';


            } else {
                echo mysqli_error($this->conn);
            }

        }
    }

    private function getLocationLink($Location): ?string
    {
            $location = <<<HTML
<p><a class="btn btn-outline-light" href="$Location">Location</a></p>
HTML;
        if (!empty($Location))
            return $location;
        return null;
    }

    private function getBookCard(?string $Location,?string $downloadFile,
                                 ?array $Description,mixed $price,?string $image,
                                 ?string $bookName): string
    {
        $price = ($price==0 || empty($price)? "Free":$price."jd");
        $descriptionBtn = $Description?$Description["modal"]["btn"]:"";
        $descriptionModal = $Description?$Description["modal"]["body"]:"";
        return <<<HTML
 <div class="col-12 col-sm-4 col-lg-4">
<div class="single-product-area mb-50">
<!-- Product Image -->
<div class="product-img">
<a>
<img src="imag/$image" style="height: 350px;width:100%; border: 9px solid;" >
</a>
</div>
<!-- Product Info -->
<div class="product-info mt-15 text-center " style="background: #36553F;color: whitesmoke !important;">
<p> $bookName </p>
<div style="background-color: #70c745;border-radius: 6%" class="p-2">
<h6> $price </h6> 
$downloadFile
$Location 
$descriptionBtn
</div>
</div>
</div>
</div>
$descriptionModal
HTML;
    }

    private function getDownloadFile($price,$file_path): ?string
    {
        $Link = <<<HTML
<p><a class="btn btn-outline-light" href="files/$file_path">Download Book</a></p>
HTML;
        if ($price==0 || empty($price)) {
            return $Link;
        }
        return null;
    }

    #[ArrayShape(["modal" => "string[]"])]
    private function getDescription(?int $id, ?string $bookName, ?string $Description): ?array
    {
            $modal=<<<MODAL
             <!-- Button trigger modal -->
        <button type="button" class="btn btn-outline-light" data-toggle="modal" data-target="#Modal$id">
            Book Description
        </button>
MODAL;
            $modalBody=<<<ModalBody
<!-- Modal -->
        <div class="modal fade" id="Modal$id" tabindex="-1" aria-labelledby="ModalLabel$id" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ModalLabel$id">$bookName Description</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body " style=" overflow-wrap: 
                    break-word; word-wrap: break-word;
                    hyphens: auto;
                    white-space: normal!important; ">
                        $Description
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
ModalBody;
        if (!empty($Description))
            return [
              "modal"=>[
                "btn"=>$modal,
                "body"=>$modalBody
              ]
            ];
        return null;
    }


}
?>
