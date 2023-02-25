<?php
include("partials/dbconnection.php");
    //1.get the id of Admin to be Deleted
     // Get the value and Delete 
if(isset($_GET['id']) && isset($_GET['image_name']))
{
     $id = $_GET['id'];
     $image_name = $_GET['image_name'];
     //Remove the physical image file is available
     if($image_name != "")
     {
         //Image is available. So remove it 
         $path = "../images/food/".$image_name;
         //Remove the Image 
         $remove = unlink($path);

         //if failed to remove image add an error massage and step the process

         if($remove == false)
         {
             //Set the Session Message 
             $_SESSION['remove'] = "<div class=alert alert-danger' role='alert'>Failed to Remove Category Image</div>";
             //Redirect to massge category page 
             header('location:manage-food.php');
             //stop the process
             die();
         }
     }
    //2. Create Sql query to Delete Admin
    $sql = "DELETE FROM tbl_food WHERE id=$id";
    $res = mysqli_query($conn,$sql);
    if($res==true){
        header("location:manage-food.php");
        $_SESSION['delete'] = "<div class='alert alert-success' role='alert'> Deleted Successfully.</div>";
    }
    else{
        header("location:manage-food.php");
        $_SESSION['delete'] ="<div class='alert alert-danger' role='alert'> Falied to deleted Admin try Again Later.</div>";
    }
    //3.Redirect to manage admin page with msg
}
else
{
     //redirect to Manage-category page
     header('location:manage-food.php');
}

?>