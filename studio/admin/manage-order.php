<?php include('partials/menu.php'); ?>
    <!--Main Contect Secation Starts-->
    <div class="order_manage">
        <div class="order_wrapper">
                    <!-- Button to Add Admin -->

                    <h1>Manage Order</h1>
        
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
                                <th>S.N.</th>
                                <th>food</th>
                                <th>price</th>
                                <th>qty</th>
                                <th>total</th>
                                <th>order_date</th>
                                <th>status</th>
                                <th>customer_name</th>
                                <th>customer_contact</th>
                                <th>customer_email</th>
                                <th>customer_address</th>
        </thead>
        <?php
                             //Query to get all data
                             $sql="SELECT * FROM tbl_order";   
                             $fetchdata = mysqli_query($conn,$sql);
                        
                             if($fetchdata==true){
                                $numofrow = mysqli_num_rows($fetchdata);//Funcation to get all the roes in database
                                if($numofrow>0){
                                        while($rows=mysqli_fetch_assoc($fetchdata)){
                                                $id = $rows['id'];
                                                $food = $rows['food'];
                                                $price = $rows['price'];
                                                $qty = $rows['qty'];
                                                $total = $rows['total'];
                                                $order_date = $rows['order_date'];
                                                $status = $rows['status'];
                                                $customer_name = $rows['customer_name'];
                                                $customer_contact = $rows['customer_contact'];
                                                $customer_email = $rows['customer_email'];
                                                $customer_address = $rows['customer_address'];
                                                
                                        ?>
            <tr>
                <td><?php echo $id;?></td>
                <td><?php echo $food;?></td>
                <td><?php echo $price;?></td>
                <td><?php echo $qty;?></td>
                <td><?php echo $total;?></td>
                <td><?php echo $order_date;?></td>
                <td><?php echo $status;?></td>
                <td><?php echo $customer_name;?></td>
                <td><?php echo $customer_contact;?></td>
                <td><?php echo $customer_email;?></td>
                <td><?php echo $customer_address;?></td>
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
                                <th>food</th>
                                <th>price</th>
                                <th>qty</th>
                                <th>total</th>
                                <th>order_date</th>
                                <th>status</th>
                                <th>customer_name</th>
                                <th>customer_contact</th>
                                <th>customer_email</th>
                                <th>customer_address</th>
            </tr>
        </tfoot>
    </table>
                <div class="clearfix">

                </div>

            </div>
        </div>
        <!--Main Contect Secation Ends-->
<?php include('partials/footer.php'); ?>

