<?php
    include("header-footer/header.php");
?>
<!-- prodcuts section starts  -->

<!-- menu section starts  -->

<section class="menu" id="menu">
    <h1 class="heading-1">Pizza</h1>
    <div class="box-container">
    <?php
    //Create SQL Query to display Category from database
        $sql = "SELECT * FROM tbl_food WHERE active='Yes'";

        $res = mysqli_query($conn,$sql);
        $count = mysqli_num_rows($res);

        if($count>0)
        {
            while($row = mysqli_fetch_assoc($res))
            {
                $id = $row['id'];
                $title = $row['title'];
                $description = $row['description'];
                $price = $row['price'];
                $image_name = $row['image_name'];
                ?>
                  <div class="box">
            <div class="image">
                <?php
                    if($image_name=="")
                    {
                        echo "Image not available";
                    }
                    else
                    {
                ?>
                <!-- <img src="images/menu-1.jpg" alt=""> -->
                
                <img src="<?php echo "../../web-design-course-restaurant/images/food/".$row['image_name']; ?>" alt="Image">
                <?php
                    }
                ?>
                </a>
            </div>
            <div class="content">
                <h3><?php echo $title; ?></h3>
                <!-- <h4><?php echo $description; ?></h3> -->
                <a href="<?php ?>Place Order.php?id=<?php echo $id; ?>" class="btn">Place Order</a>
                <span class="price"><?php echo $price; ?></span>
            </div>
            </div>
                <?php
            }
        }
        else
        {
            echo "<div class='alert alert-danger' role='alert'> Updated Successfully.</div>";
        }
            ?>
</section>

<!-- menu section ends -->

<!-- prodcuts section ends -->

<?php
    include("header-footer/footer.php");
?>