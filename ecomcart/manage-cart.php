<?php include('layout/header.php') ?>

    <!-- Body Section Starts -->
    <section class="content">
        <div class="wrapper">
             <strong class="heading">MANAGE Cart</strong><br>
       
             <?php include('config/session.php') ?>
             <!-- <br>
                <a class="btn btn-secondary product-add" href="add-product.php"> Add Product</a>
             <br> -->

             <!-- Products Table -->
                <table class="table bordertable">
                    <thead>
                       <tr>
                            <th>SN</th>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Action</th>
                       </tr> 
                    </thead>
                    <tbody>
                        <?php 
                        //making the sql to fetch the data from products table
                        $sql = "SELECT * FROM `cart`";
                        
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
                                    $title = $rows['product'];
                                    $price = $rows['price'];
                                    $quantity = $rows['quantity'];
                                    $total = $rows['total'];
                                   


?>
                                    <tr>
                                        <td><?php echo $sn++; ?></td>
                                        <td><?php echo $title; ?></td>
                                        <td><?php echo $price; ?></td>
                                        <td><?php echo $quantity; ?></td>
                                        <td><?php echo $total; ?></td>
                                    


                                        <td>
    
                            </a>
                                <a class="btn btn-danger" href="<?php  echo APP_URL; ?>delete-cart.php?id=<?php echo $id; ?>">
                                    Delete item
                                </a>
                                    </td>
                                </tr>
                                    <?php 
                                }  
                            }else{
                                echo'<tr><td colspan="7" class="text-center">No products to display</td></tr>';
                            }
                        }
                        
                        ?>
                        
                    </tbody>
                </table>
             <!-- Products Table End -->
        </div>
    </section>
    <!-- Body Section Ends -->

<?php include('layout/footer.php') ?>
