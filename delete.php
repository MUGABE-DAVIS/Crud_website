<?php
include "connection.php";
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "DELETE from `crud_table` where id =$id";
    $conn->query($sql);
}
header('location:/CRUD_2/index.php');
exit;

?>