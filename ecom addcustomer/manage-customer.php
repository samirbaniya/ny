<?php include('layout/header.php') ?>

    <!-- Body Section Starts -->
    <section class="content">
        <div class="wrapper">
             <h1 class="heading">MANAGE Customer</h1>
             
             <?php include('c_config/c_session.php') ?>
             <br>
                <a class="btn btn-secondary c-add" href="c-user.php"> Add Customer</a>
             <br>

             <!-- Users Table -->
                <table class="table">
                    <thead>
                       <tr>
                            <th>SN</th>
                            <th>FullName</th>
                            <th>UserName</th>
                            <th>Action</th>
                       </tr> 
                    </thead>
                    <tbody>
                        <?php 
                        //making the sql to fetch the data from customers table
                        $sql = "SELECT * FROM `Customers`";
                        
                        //execute the query
                        $exec = mysqli_query($conn, $sql);

                        //if there is something
                        if($exec == TRUE){
                            //count the number of rows
                            $count = mysqli_num_rows($exec);
                            if($count > 0){
                                $sn=1;
                                while( $rows = mysqli_fetch_assoc($exec)){
                                    $id = $rows['id'];
                                    $full_name = $rows['full_name'];
                                    $c_name = $rows['c_name'];
                                    ?>
                                    <tr>
                                        <td><?php echo $sn++; ?></td>
                                        <td><?php echo $full_name; ?></td>
                                        <td><?php echo $c_name; ?></td>
                                        <td>
                                        <a class="btn btn-secondary" href="<?php echo APP_URL;?>update-password.php?id=<?php echo $id; ?>">
                                Change Password
                            </a>
                            <a class="btn btn-primary" href="<?php echo APP_URL;?>edit-customer.php?id=<?php echo $id; ?>">
                                Edit Customer
                            </a>
                                <a class="btn btn-danger" href="<?php echo APP_URL;?>delete-customer.php?id=<?php echo $id; ?>">
                                    Delete Customer
                                </a>
                                        </td>
                                    </tr>
                                    <?php 
                                }  
                            }else{
                                echo'<tr><td colspan="4">No rows to display</td></tr>';
                            }
                        }
                        
                        ?>
                        
                    </tbody>
                </table>
             <!-- Customers Table End -->
        </div>
    </section>
    <!-- Body Section Ends -->

<?php include('common/footer.php') ?>
