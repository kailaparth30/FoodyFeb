<?php
include('partials/menu.php');
?>

<?php

//Process the value from form and Save it in Database

//Check whether the submit button is clicked or not 
$showerr=false;
if(isset($_POST['submit'])){
    $title=$_POST['title'];

    if(isset($_POST['featured']))
    {
      $featured = $_POST['featured'];
    }
    else
    {
      $featured = "No";
    }

    if(isset($_POST['active']))
    {
      $active = $_POST['active'];
    }
    else
    {
      $active = "No";
    }

    // print_r($_FILES['image_name']);

    // die();

    if(isset($_FILES['image_name']['name']))
    {
      //Upload the Image
      $image_name = $_FILES['image_name']['name'];

      //Upload the image only if image is selected
      if($image_name !="")
      {

      

        //Auto Rename our Image
        //Get the Extension of our image (jpg ,png ,gif , etc) e.g. "Special.food1.jpg"
        $ext = end(explode('.',$image_name));

        //Rename the image

        $image_name = "Food_Category_".rand(000 , 999).'.'.$ext;//e.g. Food_Category_834.jpg

        $source_path = $_FILES['image_name']['tmp_name'];

        $destination_path = "../images/category/".$image_name;

        //Finally Upload the Image
        $upload = move_uploaded_file($source_path,$destination_path);

        if($upload == false)
        {
          $_SESSION['upload'] = "<div class='alert alert-danger' role='alert'>Failed to Upload image.</div>";
          header('location:manage-category.php');
          die ();
      }
    }

    }
    else  
    {
      //Don't Upload the Image
      $image_name = "";
      
    }

    $fetchsql="SELECT * FROM `tbl_category` WHERE `image_name`= '$image_name'";
    $result=mysqli_query($conn ,$fetchsql);
    $numofrom=mysqli_num_rows($result);
      if($numofrom > 0){
          $showerr="Please use another Email id";
      }
      else{
        $sql="INSERT INTO `tbl_category` (`title`,`image_name`, `featured`,`active`) VALUES ('$title','$image_name', '$featured','$active')";
        $result=mysqli_query($conn,$sql);
          if($result){
             header("Location:manage-category.php");
             $_SESSION['add'] = "<div class='alert alert-success' role='alert'>Added Successfully. </div>";
          } 
      }
  }
  
  ?>
    <div class="main-Contect">
        <div class="wrapper">
            <center><h1>Add Category</h1></center>

                    <?php
                     if($showerr){
                        echo ' <div class="alert alert-danger" role="alert">
                              '.$showerr.'
                                 </div>';
                     }
                     ?>
            <form action="#" method="POST" enctype="multipart/form-data"> 
  <div class="form-group">
    <label for="exampleInputEmail1">Title</label>
    <input type="text" class="form-control" id="exampleInputEmail1"  placeholder="Title" name="title" required>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Select image</label>
    <input type="file" id="myFile" name="image_name">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">featured </label>
    <input class="form-check-input" type="radio" name="featured"  value="Yes"> Yes
    <input class="form-check-input" type="radio" name="featured" value="No"> No
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">active </label>
    <input class="form-check-input" type="radio" name="active"  value="Yes"> Yes
    <input class="form-check-input" type="radio" name="active" value="No"> No
  </div>
  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>
<br>
<br>
        </div>
    </div>
        
<?php
include('partials/footer.php');
?>




