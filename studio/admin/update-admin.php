<?php
include('partials/menu.php');
?>

    <div class="main-Contect">
        <div class="wrapper">
            <h1>Update Admin</h1>
<br>
<br>

        <?php
            //1.Get the id of Seleted Admin
            $id = $_GET['id'];
            //2. Create SQL Query to Get the Details
            $sql = "SELECT * FROM tbl_admin WHERE id=$id"; 
            $res =mysqli_query($conn,$sql);

            if($res==true)
            {
                $count = mysqli_num_rows($res);
                if($count==1)
                {
                    $row = mysqli_fetch_assoc($res);

                    $name = $row['name'];
                    $email = $row['email'];

                }
                else
                {
                    header('location:manage-admin.php');
                }
            }
        ?>

            <form action="#" method="POST"> 
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" class="form-control" id="exampleInputEmail1"  placeholder="Name" name="name" value="<?php echo $name; ?>">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email" value="<?php echo $email; ?>">
  </div>
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
                $id = $_POST['id'];
                $name = $_POST['name'];
                $email = $_POST['email'];

                // Create a sql query to update Admin
                $sql = "UPDATE tbl_admin SET name ='$name',email='$email' WHERE id=$id";

                $res = mysqli_query($conn,$sql);
                if($res==true)
                {
                    $_SESSION['update'] = "<div class='alert alert-success' role='alert'> Updated Successfully.</div>";
                    header('location:manage-admin.php');
                }
                else
                {
                    $_SESSION['update'] = "<div class=alert alert-danger' role='alert'> 
                    Not Updated.</div>";
                    header('location:manage-admin.php');
                }
            }

?>


<?php
include('partials/footer.php');
?>