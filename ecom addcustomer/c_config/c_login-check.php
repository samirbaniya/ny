<?php
    if(!isset($_SESSION['customers'])){
        $_SESSION['message'] = '<div class="error">login</div>';
        header('location:'.APP_URL.'index.php');
    }
?>