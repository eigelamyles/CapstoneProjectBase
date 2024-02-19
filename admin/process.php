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

 //creating dept acc 
 if(isset($_POST['create_dept'])){

   $lastname = $_POST['lastname'];
   $firstname = $_POST['firstname'];
   $email = $_POST['email'];
   $department = $_POST['department'];
   


   $check_dept  = mysqli_query($conn,"SELECT * FROM dept_account WHERE email = '$email'");

   $dept_num = mysqli_num_rows($check_dept);

   if($dept_num >= 1){
      ?>
         <script>
            alert("This email already exist");
            location.href='dept.php';
         </script>
      <?php
   }else{
      $register_dept = mysqli_query($conn,"INSERT INTO dept_account VALUES('0','$lastname','$firstname','$email','$lastname','$department')");
      if($register_dept == true){
         ?>
            <script>
               alert("Account Created Successfully!");
               location.href='dept.php';
            </script>
         <?php
      }else{
         ?>
         <script>
            alert("Account not Created!");
            location.href='dept.php';
         </script>
      <?php
      }
   }
 }

 if(isset($_POST['del_dept']))
 {
   $del_id = $_GET['id'];

   $delete_dept = mysqli_query($conn,"DELETE FROM dept_account WHERE id ='$del_id'");
   if($delete_dept == true){
      ?>
         <script>
            alert("Account Deleted!");
            location.href='dept.php';
         </script>
      <?php
   }else{
      ?>
      <script>
         alert("Account not Deleted!");
         location.href='dept.php';
      </script>
   <?php
   }
 }


 if(isset($_POST['upd_acc'])){
   $acc_id = $_GET['id'];
   $lastname = $_POST['lastname'];
   $firstname = $_POST['firstname'];
   $email = $_POST['email'];
   $department = $_POST['department'];
   $lastname = $_POST['lastname'];

   $update_acc = mysqli_query($conn,"UPDATE dept_account SET lastname = '$lastname',firstname ='$firstname',email = '$email', department='$department' WHERE id = '$acc_id'");
   if($update_acc == true){
      ?>
         <script>
            alert("Account Updated!");
            location.href='dept.php';
         </script>
      <?php
   }else{
      ?>
      <script>
         alert("Account not Updated!");
         location.href='dept.php';
      </script>
   <?php
   }
 }


 //for updating account 
 if(isset($_POST['upd_profile'])){
   $profile_id = $_GET['id'];
   $fullname = $_POST['fn'];
   $contact = $_POST['contact'];
   $address = $_POST['address'];
   $email = $_POST['email'];
   $password = $_POST['password'];

   $update = mysqli_query($conn,"UPDATE admin SET fullname = '$fullname',contact= '$contact', address='$address', password ='$password' WHERE id='$profile_id'");

   if($update == true){
      ?>
         <script>
            alert("Profile Updated!");
            location.href='profile.php';
         </script>
      <?php
   }else{
      ?>
      <script>
         alert("Profile not Updated!");
         location.href='profile.php';
      </script>
   <?php
   }

 }
?>