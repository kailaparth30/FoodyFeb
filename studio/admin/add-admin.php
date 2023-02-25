<?php
include('partials/menu.php');
?>

<?php

//Process the value from form and Save it in Database

//Check whether the submit button is clicked or not 
$showerr=false;
if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];

    $fetchsql="SELECT * FROM `tbl_admin` WHERE `email`= '$email'";
    $result=mysqli_query($conn ,$fetchsql);
    $numofrom=mysqli_num_rows($result);
      if($numofrom > 0){
          $showerr="Please use another Email id";
      }
      else{
        $sql="INSERT INTO `tbl_admin` (`name`,`email`, `password`) VALUES ('$name','$email', '$password')";
        $result=mysqli_query($conn,$sql);
          if($result){
             header("Location:manage-admin.php");
             $_SESSION['add'] = "<div class='alert alert-success' role='alert'>Added Successfully. </div>";
          }
      }
  }
  
  ?>
    <div class="main-Contect">
        <div class="wrapper">
            <center><h1>Add Admin</h1></center>

                    <?php
                     if($showerr){
                        echo ' <div class="alert alert-danger" role="alert">
                              '.$showerr.'
                                 </div>';
                     }
                     ?>
            <form action="#" method="POST"> 
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" class="form-control" id="exampleInputEmail1"  placeholder="Name" name="name" required>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email" required>
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password" required>
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




