<?php
  include "connection.php";
  $id ="";
  $name ="";
  $email ="";
  $phone ="";

  $error ="";
  $success ="";

  if($_SERVER["REQUEST_METHOD"]=='GET'){
    if(!isset($_GET['id'])){
      header("location:CRUD_2/index.php");
      exit;
    }
    $id= $_GET['id'];
    $sql= "select * from crud_table where id=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    while(!$row){
      header("location: CRUD_2/index.php");
      exit;
    }
    $name =$row["name"];
    $email =$row["email"];
    $phone =$row["phone"];
  }
  else{
    
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];

    $sql = "UPDATE crud_table set `name`='$name',email='$email',phone='$phone' where id='$id'";
    $result = $conn->query($sql);
  }


?>
<?php
include "connection.php ";
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $q="INSERT INTO crud_table(`name`,`email`,`phone`)VALUES ('$name','$email','$phone')";

     $query= mysqli_query($conn,$q); 

    // if($conn->query($q)==TRUE){
    //   $array["status"]="New record created";
    //   }else{
    //       $array["status"]="Error".$q."<br>".$conn->error;
    //   }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Crud app</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">My Crud Site</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Add Member</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            More
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">About</a></li>
            <li><a class="dropdown-item" href="#">Contact</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Services</a></li>
          </ul>
        </li>
        
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>


<div class="col-lg-6 m-auto">
<form method="post" action="#">
<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title text-center" >Update Member</h5><br>
    <input type="hidden" name="name" class="form-control" value="<?php echo $id;?>"><br>

    <label>NAME:</label>
    <input type="text" name="name" class="form-control" value="<?php echo $name;?>"> <br>

    <label>EMAIL:</label>
    <input type="text" name="email" class="form-control" value="<?php echo $email;?>"><br>

    <label>PHONE:</label>
    <input type="text" name="phone" class="form-control" value="<?php echo $phone;?>"><br>

    <button class="btn btn-success" type="submit" name="submit" >Submit</button>
    <a class="btn btn-info" type="submit" name="cancel" href="index.php">Cancel</a><br>



    
  </div> 
</div>
</div>
</form>


 

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>