<?php include('partials/menu.php'); ?>
    <!--Main Contect Secation Starts-->
    <div class="main-Contect">
        <div class="food-wrapper">
                    <!-- Button to Add Admin -->
                    <a href="add-food.php" class="btn-primary">Add Food</a>
                    <h1>Manage Food</h1>
                <?php
                       
                        if(isset($_SESSION['upload']))
                        {
                        echo $_SESSION['upload'];
                        unset($_SESSION['upload']);
                        }       

                        if(isset($_SESSION['remove']))
                        {
                        echo $_SESSION['remove'];
                        unset($_SESSION['remove']);
                        }

                        if(isset($_SESSION['no-food-found']))
                        {
                        echo $_SESSION['no-food-found'];
                        unset($_SESSION['no-food-found']);
                        }
                        // if(isset($_SESSION['add']))
                        // {
                        // echo $_SESSION['add'];
                        // unset($_SESSION['add']);
                        // }

                        if(isset($_SESSION['failed-remove']))
                        {
                        echo $_SESSION['failed-remove'];
                        unset($_SESSION['failed-remove']);
                        }

                        if(isset($_SESSION['delete']))
                        {
                        echo $_SESSION['delete'];
                        unset($_SESSION['delete']);
                        }

                        if(isset($_SESSION['update']))
                        {
                        echo $_SESSION['update'];
                        unset($_SESSION['update']);
                        }

                ?>
                    <table id="example" class="table table-striped table-bordered" style="width:100%">

                        <thead>
                                <th>S.N.</th>
                                <th>title</th>
                                <th>description</th>
                                <th>price</th>
                                <th>image_name</th>
                                <th>category_id</th>
                                <th>featured</th>
                                <th>active</th>
                                <th>Update</th>
                                <th>Delete</th>
                        </thead>


                        <?php
                             //Query to get all data
                             $sql="SELECT * FROM tbl_food";   
                             $fetchdata = mysqli_query($conn,$sql);
                        
                             if($fetchdata==true){
                                $numofrow = mysqli_num_rows($fetchdata);//Funcation to get all the roes in database
                                if($numofrow>0){
                                        while($rows=mysqli_fetch_assoc($fetchdata)){
                                                $id = $rows['id'];
                                                $title = $rows['title'];
                                                $description = $rows['description'];
                                                $price = $rows['price'];
                                                $image_name = $rows['image_name'];
                                                $category_id = $rows['category_id'];
                                                $featured = $rows['featured'];
                                                $active = $rows['active'];

                                        ?>
                                        <tr>
                                                <td><?php echo $id;?></td>
                                                <td><?php echo $title; ?></td>
                                                <td><?php echo $description; ?></td>
                                                <td><?php echo $price; ?></td>
                                                <td><?php echo $image_name; ?></td>
                                                <td><?php echo $category_id;?></td>
                                                <td><?php echo $featured; ?></td>
                                                <td><?php echo $active; ?></td>
                                                <td>
                                                <a href="<?php ?>update-food.php?id=<?php echo $id; ?>" class="btn-secondary">Update</a>
                                                </td>
                                                <td>
                                                <a href="<?php ?>delete-food.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name;?>" class="btn-danger">Delete</a>
                                                </td>

                                        </tr>

                                        <?php
                                        }
                                }
                             }
                             else{
                                //dfjnasndkwanfwanfwal
                             }
                        ?>
                        </tr>
         </tbody>
        <tfoot>
                <tr>
                        <th>S.N.</th>
                        <th>title</th>
                        <th>image_name</th>
                        <th>featured</th>
                        <th>active</th>
                        <th>Update</th>
                        <th>Delete</th>
                </tr>
        </tfoot>
                </table>     
                <div class="clearfix">

                </div>

            </div>
        </div>
        <!--Main Contect Secation Ends-->
<?php include('partials/footer.php'); ?>

