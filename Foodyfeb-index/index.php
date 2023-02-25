<?php
    include('category/header-footer/header.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>complete responsive flower website design tutorial</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="category/css/style.css">

</head>
<body>

<!-- home section starts  -->

<section class="home" id="home">

    <div class="content">
        <h3>FOODY FEB</h3>
        <span>food odering sysytem </span>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae laborum ut minus corrupti dolorum dolore assumenda iste voluptate dolorem pariatur.</p>
        <a href="#" class="btn">Book now</a>
    </div>
    
</section>

   <!-- header section starts  -->

   <header>
    
    <label for="toggler" class="fas fa-bars"></label>
    
    <a href="#" class="logo text-decoration-none">FOODY FEB<span>.</span></a>
    
    <nav class="navbar">
        <a class="text-decoration-none" href="#home">home</a>
        <a class="text-decoration-none" href="#about">about</a>
        <a class="text-decoration-none" href="#Food Category">Food category</a>
        <a class="text-decoration-none" href="#contact">contact</a>
    </nav>
    
    <div class="icons">
        <a href="logout.php" class="fas fa-user"></a>
    </div>
    
    </header>
<!-- home section ends -->

<!-- about section starts  -->

<section class="about" id="about">

    <h1 class="heading"> <span> about </span> us </h1>

    <div class="row">

        <div class="video-container">
            <video src="category/images/food video.mp4" loop autoplay muted></video>
            <h3>foody feb</h3>
        </div>

        <div class="content">
            <h3>why choose us?</h3>
            <p>Food is any substance consumed to provide nutritional support and energy to an organism. It can be raw, processed or formulated and is consumed orally by animals for growth, health or pleasure. </p>
            <p>Food is any substance consumed to provide nutritional support and energy to an organism. It can be raw, processed or formulated and is consumed orally by animals for growth, health or pleasure. </p>
            <a href="#" class="btn">learn more</a>
        </div>

    </div>

</section>

<!-- about section ends -->


<!--foody categroy start -->

<section class="about" id="about">

    <h1 class="heading"> <span> food</span> category </h1>


</section>

<!--foody categroy end-->


<section class="icons-container" id="Food Category">
    <?php
    //Create SQL Query to display Category from database
        $sql = "SELECT * FROM tbl_category WHERE active='Yes'";

        $res = mysqli_query($conn,$sql);
        $count = mysqli_num_rows($res);

        if($count>0)
        {
            while($row = mysqli_fetch_assoc($res))
            {
                $id = $row['id'];
                $title = $row['title'];
                $image_name = $row['image_name'];
                ?>
                    <a href="category/pizza.php">
                        <div class="icons">
                            <?php
                                if($image_name=="")
                                {
                                    echo "Image not available";
                                }
                                else
                                {
                                    ?>
                                        <img src="<?php echo "../web-design-course-restaurant/images/category/".$row['image_name']; ?>" alt="Image">
                                    <?php
                                }
                            ?>
                     
                        <h3><?php echo $title; ?></h3>
                        </div>
                    </a>
                <?php
            }
        }
        else
        {
            echo "<div class='alert alert-danger' role='alert'> Updated Successfully.</div>";
        }
    ?>
</section>

<!-- icons section ends -->



<!-- contact section starts  -->

<section class="contact" id="contact">

    <h1 class="heading"> <span> contact</span> us </h1>

    <div class="row">

        <form action="">
            <input type="text" placeholder="name" class="box">
            <input type="email" placeholder="email" class="box">
            <input type="number" placeholder="number" class="box">
            <textarea name="" class="box" placeholder="message" id="" cols="30" rows="10"></textarea>
            <input type="submit" value="send message" class="btn">
        </form>

        <div class="image">
            <img src="category/images/last 1.jpg" alt="">
        </div>

    </div>

</section>

<!-- contact section ends -->

<?php
    include('category/header-footer/footer.php');
?>