<?php include('partials/menu.php'); ?>
    <!--Main Contect Secation Starts-->
    <div class="main-Contect">
        <div class="wrapper">

                    <!-- Button to Add Admin -->
                    <a href="add-category.php" class="btn-primary">Add Category</a>
                    <h1>Manage Category</h1>
                        <?php
                                if(isset($_SESSION['add']))
                                {
                                echo $_SESSION['add'];
                                unset($_SESSION['add']);
                                }    
                                
                                if(isset($_SESSION['remove']))
                                {
                                echo $_SESSION['remove'];
                                unset($_SESSION['renove']);
                                }

                                if(isset($_SESSION['delete']))
                                {
                                echo $_SESSION['delete'];
                                unset($_SESSION['delete']);
                                }

                                if(isset($_SESSION['no-category-found']))
                                {
                                echo $_SESSION['no-category-found'];
                                unset($_SESSION['no-category-found']);
                                }

                                if(isset($_SESSION['update']))
                                {
                                echo $_SESSION['update'];
                                unset($_SESSION['update']);
                                }

                                if(isset($_SESSION['upload']))
                                {
                                echo $_SESSION['upload'];
                                unset($_SESSION['upload']);
                                }

                                if(isset($_SESSION['failed-remove']))
                                {
                                echo $_SESSION['failed-remove'];
                                unset($_SESSION['failed-remove']);
                                }
                        ?>
                    <table id="example" class="table table-striped table-bordered" style="width:100%">

                        <thead>
                                <th>S.N.</th>
                                <th>title</th>
                                <th>image_name</th>
                                <th>featured</th>
                                <th>active</th>
                                <th>Update</th>
                                <th>Delete</th>
                        </thead>


                        <?php
                             //Query to get all data
                             $sql="SELECT * FROM tbl_category";   
                             $fetchdata = mysqli_query($conn,$sql);
                        
                             if($fetchdata==true){
                                $numofrow = mysqli_num_rows($fetchdata);//Funcation to get all the roes in database
                                if($numofrow>0){
                                        while($rows=mysqli_fetch_assoc($fetchdata)){
                                                $id = $rows['id'];
                                                $title = $rows['title'];
                                                $image_name = $rows['image_name'];
                                                $featured = $rows['featured'];
                                                $active = $rows['active'];

                                        ?>
                                        <tr>
                                                
                                                <td><?php echo $id;?></td>
                                                <td><?php echo $title; ?></td>
                                                <td><?php echo $image_name; ?></td>
                                                <td><?php echo $featured; ?></td>
                                                <td><?php echo $active; ?></td>
                                                <td>
                                                <a href="<?php ?>update-category.php?id=<?php echo $id; ?>" class="btn-secondary">Update</a>
                                                </td>
                                                <td>
                                                <a href="<?php ?>delete-category.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name;?>" class="btn-danger">Delete</a>
                                                </td>

                                        </tr>

                                        <?php
                                        }
                                }
                             }
                             else{
  
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

