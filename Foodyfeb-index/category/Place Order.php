<?php
    include("header-footer/header.php");

    if(isset($_GET['id']))
    {
        $id = $_GET['id'];
        $sql ="SELECT * FROM tbl_food WHERE id=$id";

        $res = mysqli_query($conn,$sql);

        $count = mysqli_num_rows($res);
        if($count == 1)
        {
          $row = mysqli_fetch_assoc($res);
          $title = $row['title'];
          $price = $row['price'];
          $image_name = $row['image_name'];
        }
    }
?>
<section class="order" id="order">

    <h1 class="heading-1"> order now </h1>

    <form action="">
        <div class="row">
            <div class="col">
                <img src="<?php echo "../../web-design-course-restaurant/images/food/".$row['image_name']; ?>"
                    alt="Image">
            </div>
            <div class="col">
                <h1>Title:<?php echo $title;?></h1>
                <h1>price:<?php echo $price; ?></h1>
                <div class="form-outline input-food">
                <label class="form-label input-food-1" for="typeNumber input-food-1">Number input</label>
    <input type="number" id="typeNumber" class="form-control" max="10" min="1" />
</div>
            </div>
        </div>
        </div>

        <div class="inputBox">
            <div class="input">
                <span>your name</span>
                <input type="text" placeholder="enter your name">
            </div>
            <div class="input">
                <span>your number</span>
                <input type="text" placeholder="enter your number">
            </div>
        </div>
        <div class="inputBox">
            <div class="input">
                <span>your Email</span>
                <input type="text" placeholder="enter food name">
            </div>
            <div class="input">
                <span>additional food</span>
                <input type="test" placeholder="extra with food">
            </div>
        </div>

        
        <div class="inputBox">
            <div class="input">
                <span>your address</span>
                <textarea name="" placeholder="enter your address" id="" cols="30" rows="10"></textarea>
            </div>
            <div class="input">
                <span>your message</span>
                <textarea name="" placeholder="enter your message" id="" cols="30" rows="10"></textarea>
            </div>
        </div>

        <a href="payment.php"><input type="submit" value="order now" class="btn"></a>

    </form>

</section>
<?php
    include("header-footer/footer.php");
?>