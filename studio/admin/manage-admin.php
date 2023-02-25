<?php
include('partials/menu.php');
?>

        <!--Main Contect Secation Starts-->
        <div class="main-Contect">
        <div class="wrapper">
                <!-- Button to Add Admin -->
                <a href="add-admin.php" class="btn-primary">Add Admin</a>
                <h1>Manage Admin</h1>
        <?php
        if(isset($_SESSION['add']))
        {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
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
                <th>Name</th>
                <th>Email id</th>
                <th><center>Update</center></th>
                <th><center>Delete</center></th>
        </thead>
        
                <?php
        //Query to get all data
        $sql="SELECT * FROM tbl_admin";   
        $fetchdata = mysqli_query($conn,$sql);

        if($fetchdata==true){
        $numofrow = mysqli_num_rows($fetchdata);//Funcation to get all the roes in database
        if($numofrow>0){
                while($rows=mysqli_fetch_assoc($fetchdata)){
                        $id = $rows['id'];
                        $name = $rows['name'];
                        $email = $rows['email'];

                ?>
                <tr>
                        <td><?php echo $id;?></td>
                        <td><?php echo $name; ?></td>
                        <td><?php echo $email; ?></td>
                        <td>
                        <center><a href="<?php ?>update-admin.php?id=<?php echo $id; ?>" class="btn-secondary">Update</a><center>
                        </td>
                        <td>
                        <center><a href="<?php ?>delete-admin.php?id=<?php echo $id; ?>" class="btn-danger">Delete</a></center>
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
                <th>Name</th>
                <th>Email id</th>
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

<?php
include('partials/footer.php');
?>
