<?php
include('partials/menu.php');
?>

    <div class="main-Contect">
        <div class="wrapper">
            <center><h1>Add Food</h1></center>

            <form action="#" method="POST" enctype="multipart/form-data"> 
  <div class="form-group">
    <label for="exampleInputEmail1">Title</label>
    <input type="text" class="form-control" id="exampleInputEmail1"  placeholder="Title" name="title" required>
  </div>

  <div class="form-group">
    <label for="exampleFormControlTextarea1">Description</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description" placeholder="Description"></textarea>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Price</label>
    <input type="number" class="form-control" id="exampleInputEmail1"  placeholder="Price" name="price" required>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Select image</label>
    <input type="file" id="myFile" name="image_name">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Category</label>
    <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="category_id">

      <?php
        //Create PHP Code to display categories from database
        //1. Create SQL to get all active categories from 
        $sql = "SELECT * FROM tbl_category WHERE active = 'Yes' ";

        $res = mysqli_query($conn,$sql);
        //Count Rows to check whether we have categories or not
        $count = mysqli_num_rows($res);

        if($count>0)
        {
            while($row = mysqli_fetch_assoc($res))
            {
              // Get the all details of categories 
              $id = $row['id'];
              $title = $row['title'];
              ?>
               <option value="<?php echo $id; ?>"><?php echo $title; ?></option>
              <?php
            }
        }
        else
        {
          ?>
            <option value="0">No Category Found</option>
          <?php
        }
        //2.display on dropdonw

      ?>

      <option selected>Open this select category</option>
    </select>
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

<?php

    if(isset($_POST['submit']))
    {
      // add the food in database 
      //1.Get the data from form 
      $title = $_POST['title'];
      $description = $_POST['description'];
      $price = $_POST['price'];
      $category_id = $_POST['category_id'];

      //Check whether redion button for featured and active are Checked or not
      if(isset($_POST['featured']))
      {
        $featured =$_POST['featured'];
      }
      else
      {
        $featured = "No";
      }

      if(isset($_POST['active']))
      {
        $active =$_POST['active'];
      }
      else
      {
        $active = "No";
      }
      //2.upload the image if selected 
      if(isset($_FILES['image_name']['name']))
      {
          $image_name = $_FILES['image_name']['name'];

          //Check whether the image is selected or not and upload image only if selected 
          if($image_name !="")
          {
            //image is selected 
            //get the extension of selected image (jpg,png,gif etc...)
            $tmp = explode('.',$image_name);
            $extGet = end($tmp);
            // $extGet = end(explode('.',$image_name));

            //Create new name for image 
            $image_name = "Food_Name_".rand(000 , 999).'.'.$extGet;//e.g. Food_Name_834.jpg

            //Source path is the Current location of the image 
            $source_path = $_FILES['image_name']['tmp_name'];

            $destination_path = "../images/Food/".$image_name;
    
            //Finally Upload the Image
            $upload = move_uploaded_file($source_path,$destination_path);
    
            if($upload == false)
            {
              $_SESSION['upload'] = "<div class='alert alert-danger' role='alert'>Failed to Upload image.</div>";
              header('location:manage-food.php');
              die ();
            }
          }
      }
      else
      {
        $imahe_name = "";
      }
      //3.insert into database 
      $sql2="INSERT INTO `tbl_food` (`title`,`description`,`price`,`image_name`,`category_id`,`featured`,`active`) VALUES ('$title','$description',$price,'$image_name',$category_id,'$featured','$active')";

      $res2 = mysqli_query($conn,$sql2);
      //4.Redirect with Message to manage food page
      //Check whether data inserted or not 
      if($res2 == true)
          {
            //Food Added
            $_SESSION['add'] = "<div class='alert alert-success' role='alert'> Added Seccssfully.</div>";
            header('location:manage-food.php');
          }
          else
          {
            //failed to Add Food
            $_SESSION['add'] = "<div class='alert alert-danger' role='alert'> Not Added.</div>";
            header('location:manage-food.php');
          }
    }
?>
        </div>
    </div>
        
<?php
include('partials/footer.php');
?>




