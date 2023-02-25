<?php
$loggin=false;
$showerr=false;
if($_SERVER['REQUEST_METHOD'] == 'POST'){
  include("category/header-footer/header.php");
    $email = $_POST['email'];
    $password = $_POST['password'];
    $fetchsql="SELECT * FROM `users` WHERE  `email` ='$email'";
    $result=mysqli_query($conn,$fetchsql);
    $numofrow=mysqli_num_rows($result);
    if($numofrow == 1){
        while($row=mysqli_fetch_assoc($result)){
            if($Password == $row['Password']){
                session_start();
                $_SESSION['loggedin']=true;
                header("Location:index.php");
            }
            else{
              $showerr="invalid Password";
            }
        }
    }
    else{
        $showerr= "invalid user";
    }
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Foodyfeb</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU"
      crossorigin="anonymous">
    <link rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <section class="vh-90" style="background-color: #9A616D;">
      <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col col-xl-10">
            <div class="card" style="border-radius: 1rem;">
              <div class="row g-0">
                <div class="col-md-6 col-lg-5 d-none d-md-block">
                  <img
                    src="https://www.foodiesfeed.com/wp-content/uploads/2019/06/top-view-for-box-of-2-burgers-home-made.jpg"
                    alt="login form" class="img-fluid" style="border-radius:
                    1rem 0 0 1rem;" />
                </div>
                <div class="col-md-6 col-lg-7 d-flex align-items-center">
                  <div class="card-body p-4 p-lg-5 text-black">

                    <form action="#" method="POST">

                      <div class="d-flex align-items-center mb-3 pb-1">
                        <i class="fas fa-cubes fa-2x me-3" style="color:
                          #ff6219;"></i>
                        <span class="h1 fw-bold mb-0">Log in</span>
                      </div>

                      <?php
                    if($showerr){
                        echo ' <div class="alert alert-danger" role="alert">
                         '.$showerr.'
                      </div>';
                    }
                
                    ?>

                      <div class="form-outline mb-4">
                        <input type="email" id="form2Example17" placeholder="Your Email"
                          class="form-control form-control-lg" name="email"/>
                        <!-- <label class="form-label" for="form2Example17">Email
                          address</label> -->
                      </div>

                      <div class="form-outline mb-4">
                        <input type="password" id="form2Example27" placeholder="Password"
                          class="form-control form-control-lg" name="password"/>
                        <!-- <label class="form-label" for="form2Example27">Password</label> -->
                      </div>

                      <div class="pt-1 mb-4">
                        <button class="btn btn-dark btn-lg btn-block"
                          type="submit" name="submit">Login</button>
                      </div>

                      <a class="small text-muted" href="#!">Forgot password?</a>
                      <p class="mb-5 pb-lg-2" style="color: #393f81;">Don't have
                        an account? <a href="Register.php"
                          style="color: #393f81;">Register here</a></p>
                    </form>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </body>
</html>