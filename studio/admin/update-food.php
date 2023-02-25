<?php
include('partials/menu.php');
?>

    <div class="main-Contect">
        <div class="wrapper">
            <h1>Update Food</h1>
<br>
<br>



        <?php
        if(isset($_GET['id']))
        {
          //Get the id amd all other details
          $id = $_GET['id'];
          $sql = "SELECT * FROM tbl_food WHERE id=$id"; 

          $res = mysqli_query($conn,$sql);

          $count = mysqli_num_rows($res);

          if($count == 1)
          {
            $row = mysqli_fetch_assoc($res);
            $title = $row['title'];
            $description = $row['description'];
            $price = $row['price'];
            $current_image = $row['image_name'];
            $featured = $row['featured'];
            $active = $row['active'];

          }
          else
          {
            $_SESSION['no-food-found'] = "<div class=alert alert-danger' role='alert'> food not Found </div>";
            header('location:manage-food.php');
          }
        }
        else
        {
        //Redirect to Manage Category
        header('location:manage-food.php');
        }

        ?>
<form action="#" method="POST"> 
  <div class="form-group">
    <label for="exampleInputEmail1">Title</label>
    <input type="text" class="form-control" id="exampleInputEmail1"  placeholder="Title" name="title" value="<?php echo $title ?>">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">description</label>
    <input type="text" class="form-control" id="exampleInputEmail1"  placeholder="description" name="description" value="<?php echo $description ?>">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">price</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="price" name="price" value="<?php echo $price ?>">
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
  <button type="submit" class="btn btn-primary" name="submit">Update</button>
</form>
<br>
<br>
        </div>
    </div>

<?php

            if(isset($_POST['submit']))
            {
                //Get all the values fron form to  update
                $title = $_POST['title'];
                $description = $_POST['description'];
                $price = $_POST['price'];
                $image_name = $_POST['image_name'];
                $featured = $_POST['featured'];
                $active = $_POST['active'];

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

        $image_name = "Food_Name_".rand(000 , 999).'.'.$ext;//e.g. Food_Category_834.jpg

        $source_path = $_FILES['image_name']['tmp_name'];

        $destination_path = "../images/food/".$image_name;

        //Finally Upload the Image
        $upload = move_uploaded_file($source_path,$destination_path);

        if($upload == false)
        {
          $_SESSION['upload'] = "<div class='alert alert-danger' role='alert'>Failed to Upload image.</div>";
          header('location:manage-food.php');
          die ();
      }
              //Remove the current image
              if($current_image !="")
              {
                $remove_path = "../images/food/".$current_image;
                $remove = unlink($remove_path);
  
                if($remove==false)
                {
                  $_SESSION['failed-remove'] = "<div class='alert alert-danger' role='alert'>Failed to Upload image.</div>";
                  header('location:manage-food.php');
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

                // Create a sql query to update Admin
                $sql = "UPDATE tbl_food SET title ='$title',description='$description',price='$price',image_name='$image_name',featured = '$featured',active = '$active' WHERE id=$id";

                $res = mysqli_query($conn,$sql);
                if($res==true)
                {
                    $_SESSION['update'] = "<div class='alert alert-success' role='alert'> Updated Successfully.</div>";
                    header('location:manage-food.php');
                }
                else
                {
                    $_SESSION['update'] = "<div class=alert alert-danger' role='alert'> 
                    Not Updated.</div>";
                    header('location:manage-food.php');
                }
            }

?>


<?php
include('partials/footer.php');
?>