<?php
include('partials/menu.php');
?>

    <div class="main-Contect">
        <div class="wrapper">
            <h1>Update Category</h1>
<br>
<br>
    <?php
      if(isset($_GET['id']))
      {
        //Get the id amd all other details
        $id = $_GET['id'];
        $sql ="SELECT * FROM tbl_category WHERE id=$id";

        $res = mysqli_query($conn,$sql);

        $count = mysqli_num_rows($res);

        if($count == 1)
        {
          $row = mysqli_fetch_assoc($res);
          $title = $row['title'];
          $current_image = $row['image_name'];
          $featured = $row['featured'];
          $active = $row['active'];

        }
        else
        {
          $_SESSION['no-category-found'] = "<div class=alert alert-danger' role='alert'> Category not Found </div>";
          header('location:manage-category.php');
        }

      }
      else
      {
        //Redirect to Manage Category
        header('location:manage-category.php');
      }
    ?>

<form action="#" method="POST" enctype="multipart/form-data"> 
  <div class="form-group">
    <label for="exampleInputEmail1">Title</label>
    <input type="text" class="form-control" id="exampleInputEmail1"  placeholder="Title" name="title"  value="<?php echo $title; ?>">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Current Image : <?php echo $current_image; ?></label>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">New image</label>
    <input type="file" id="myFile" name="image_name">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">featured : </label>
    <input <?php if($featured=="Yes"){echo "checked";} ?> class="form-check-input" type="radio" name="featured"  value="Yes"> Yes

    <input <?php if($featured=="No"){echo "checked";} ?> class="form-check-input" type="radio" name="featured" value="No"> No
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">active : </label>
    <input  <?php if($active=="Yes"){echo "checked";} ?> class="form-check-input" type="radio" name="active"  value="Yes"> Yes
    <input  <?php if($active=="No"){echo "checked";} ?> class="form-check-input" type="radio" name="active" value="No"> No
  </div>
  </div> 
  <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
  <input type="hidden" name="id" value="<?php echo $id; ?>">
  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>
<br>
<br>
      <?php
      if(isset($_POST['submit']))
      {
          //1.Get all the values from our form 
          $id = $_POST['id'];
          $title = $_POST['title'];
          $image_name = $_POST['image_name'];
          $featured = $_POST['featured'];
          $active =$_POST['active'];

          //2. Updateing New image if selected 
          if(isset($_FILES['image_name']['name']))
          {
            //Get the image Details
            $image_name =$_FILES['image_name']['name'];

            if($image_name != "")
            {
              //image Available 
              //Upload the New image 
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
              //Remove the current image
              if($current_image !="")
              {
                $remove_path = "../images/category/".$current_image;
                $remove = unlink($remove_path);
  
                if($remove==false)
                {
                  $_SESSION['failed-remove'] = "<div class='alert alert-danger' role='alert'>Failed to Upload image.</div>";
                  header('location:manage-category.php');
                  die();
                }
              }
             
            }
            else
            {
              $image_name = $current_image;
            }
          }
          else
          {
            $image_name = $current_image;
          }

          //3. Update the database 
          $sql2 = "UPDATE tbl_category SET title ='$title',image_name = '$image_name',featured = '$featured',active = '$active' WHERE id = '$id'";

          $res2 = mysqli_query($conn,$sql2);

          //4.Redirect to manage category with Message  
          if($res2==true)
          {
            //Category Updated
            $_SESSION['update'] = "<div class='alert alert-success' role='alert'> Updated Successfully.</div>";
            header('location:manage-category.php');
          }
          else
          {
            //failed to update category
            $_SESSION['update'] = "<div class='alert alert-danger' role='alert'> Updated Successfully.</div>";
            header('location:manage-category.php');
          }
      }

      ?>
        </div>
    </div>
<?php
include('partials/footer.php');
?>