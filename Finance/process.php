<?php 
 include '../conn.php';

 if(isset($_POST['save'])){
    $update_id = $_GET['id'];
    $status = $_POST['status'];
    $comply = $_POST['comply'];


    $update_status = mysqli_query($conn,"UPDATE clea SET status = '$status', completion='$comply' WHERE id='$update_id'");

    if($update_status == true ){
            ?>
                <script>
                    alert("Status Updated Succesfully!");
                    location.href='index.php';
                </script>
            <?php
    }else{
        ?>
            <script>
                    alert("Status Not Updated!");
                    location.href='index.php';
                </script>
        <?php
    }
 }
?>