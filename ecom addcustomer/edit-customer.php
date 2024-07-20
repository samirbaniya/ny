<?php include('layout/header.php') ?>

    <!-- Body Section Starts -->
    <section class="content">
        <div class="wrapper">
             <h1 class="heading">EDIT CUSTOMERS</h1>
            <br>
            <?php include('c_config/c_session.php') ?>
            <?php 
            //getting id
            $id = $_GET['id'];
            
            //making sql to select value
            $sql = "SELECT * FROM customers where id='$id'";

            //execute the query
            $exec = mysqli_query($conn,$sql);

            //count the number of rows
            $count = mysqli_num_rows($exec);

            if($count == 1){
                while($rows=mysqli_fetch_assoc($exec)){
                    $id = $rows['id'];
                    $full_name = $rows['full_name'];
                    $c_name = $rows['c_name'];
                }
            }

            ?>
             <!-- Customer Add Form -->
                <form method="post" action="">
                    <table class="table">
                        <tr>
                            <td class="text-right">UserName</td>
                            <td><input type="text" name="c_name" value="<?php echo $c_name; ?>" placeholder="Enter your Username" id="c_name" class="form-control"></td>
                        </tr>
                        <tr>
                            <td class="text-right">FullName</td>
                            <td><input type="text" name="full_name" value="<?php echo $full_name; ?>" placeholder="Enter your Fullname" id="full_name" class="form-control"></td>
                        </tr>
                       
                        <tr>
                            <td colspan="2" class="text-center">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">    
                            <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-primary"></td>
                        </tr>
                    </table>
                </form>
             <!-- Customer Add Form End -->
        </div>
    </section>
    <!-- Body Section Ends -->

   

<?php include('common/footer.php') ?>

<?php 
//Form Submit Code
//check if request method is POST or not
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST['submit'])){
        
         //Getting the data from the web form in respective variable
        $full_name = $_POST['full_name'];
        $user_name = $_POST['user_name'];
        $id = $_POST['id'];

        //making sql
        $sql = "UPDATE customers SET
        full_name='$full_name',
        c_name='$c_name'
        WHERE id='$id'";

        //Check the connection
        if($conn){
            $execute = mysqli_query($conn, $sql) or die(mysqli_error($conn));
            //create database 
            if($execute = TRUE){
                $_SESSION['message']= '<div class="success"> Customer updated Succefully </div>';
                header('location:'.APP_URL.'manage-customer.php');
            }else{
                $_SESSION['message'] = '<div class="error"> Could not Edit customer Instantly. Try Again </div>';
                header('location:'.APP_URL.'edit-customer.php?id='.$id);
            }
        }else{
            die("Connection Failed".mysqli_connect_error());
        }

    }
}
?>