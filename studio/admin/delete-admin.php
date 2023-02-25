<?php
include("partials/dbconnection.php");
    //1.get the id of Admin to be Deleted
    $id = $_GET['id'];
    //2. Create Sql query to Delete Admin
    $sql = "DELETE FROM tbl_admin WHERE id=$id";
    $res = mysqli_query($conn,$sql);
    if($res==true){
        header("location:manage-admin.php");
        $_SESSION['delete'] = "<div class='alert alert-success' role='alert'> Deleted Successfully.</div>";
    }
    else{
        header("location:manage-admin.php");
        $_SESSION['delete'] ="<div class='alert alert-danger' role='alert'> Falied to deleted Admin try Again Later.</div>";
    }
    //3.Redirect to manage admin page with msg
?>