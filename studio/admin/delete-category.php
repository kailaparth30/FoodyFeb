<?php
include("partials/dbconnection.php");
   //Ckeck whether the id amd image_name value is set or not 
   if(isset($_GET['id']) && isset($_GET['image_name']))
   {
        // Get the value and Delete 
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];
        //Remove the physical image file is available
        if($image_name != "")
        {
            //Image is available. So remove it 
            $path = "../images/category/".$image_name;
            //Remove the Image 
            $remove = unlink($path);

            //if failed to remove image add an error massage and step the process

            if($remove == false)
            {
                //Set the Session Message 
                $_SESSION['remove'] = "<div class=alert alert-danger' role='alert'>Failed to Remove Category Image</div>";
                //Redirect to massge category page 
                header('location:manage-category.php');
                //stop the process
                die();
            }
        }
        //delete data from database 
        $sql = "DELETE FROM tbl_category WHERE id = $id";
        //Redirect to Manage Category page with Message

        $res = mysqli_query($conn,$sql);
        //Check whether the data is delete from database or not
        if($res == true)
        {
            $_SESSION['delete'] = "<div class='alert alert-success' role='alert'> Updated Successfully.</div>";
            header('location:manage-category.php');
        }
        else 
        {
            $_SESSION['delete'] = "<div class=alert alert-danger' role='alert'> 
            Failed to Delete </div>";
            header('location:manage-category.php');
        }

   }
   else
   {
        //redirect to Manage-category page
        header('location:manage-category.php');
   }
?>