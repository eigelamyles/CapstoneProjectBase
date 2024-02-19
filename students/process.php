<?php 
 include '../conn.php';

 if(isset($_POST['add_student'])){

 }


 if(isset($_POST['approve'])){
   $id_app = $_GET['id']; 
   $id_number  =$_GET['id_number'];

   $update = mysqli_query($conn,"UPDATE students SET account_status = 'Approved' WHERE id='$id_app'");
   
   $insert_lib = mysqli_query($conn,"INSERT INTO clea VALUES('0','$id_number','LIBRARIAN','','')");

   $insert_csdl =  mysqli_query($conn,"INSERT INTO clea VALUES('0','$id_number','CSDL','','')");

   $insert_gsd =  mysqli_query($conn,"INSERT INTO clea VALUES('0','$id_number','GSD','','')");

   $insert_cdean =  mysqli_query($conn,"INSERT INTO clea VALUES('0','$id_number','CITE DEAN','','')");

   $insert_registrar =  mysqli_query($conn,"INSERT INTO clea VALUES('0','$id_number','REGISTRAR','','')");
   $insert_finance =  mysqli_query($conn,"INSERT INTO clea VALUES('0','$id_number','FINANCE','','')");

   if($update == true){
      ?>
         <script>
            alert("Account has been Approved!");
            location.href='new_acc.php';
         </script>
      <?php
   }else{
      ?>
      <script>
         alert("Some error Occur!");
         location.href='new_acc.php';
      </script>
   <?php
   }


   
 }
?>