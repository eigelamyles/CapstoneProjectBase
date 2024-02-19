<?php 
include 'conn.php';
session_start();


if(isset($_POST['login'])){
    $user_type   = mysqli_real_escape_string($conn,$_POST['user_type']);
    $admin_email = mysqli_real_escape_string($conn,$_POST['admin_email']);
    $admin_pass  = mysqli_real_escape_string($conn,$_POST['admin_pass']);

   
        switch($user_type){
             case 'Admin':
                $admin_log = mysqli_query($conn,"SELECT * FROM admin WHERE email = '$admin_email' and password = '$admin_pass'");
                $admin_num = mysqli_num_rows($admin_log);
            
                if($admin_num >= 1){
                    $_SESSION['email'] = $admin_email;
                    ?>
                        <script>
                            alert("Welcome Admin");
                            window.location.href='admin/index.php';
                        </script>
                    <?php
                }else{
                    ?>
                    <script>
                        alert("Wrong Email or Password");
                        window.location.href='index.php';
                    </script>
                <?php
                }
            break;
            case 'Librarian':
                $librarian = mysqli_query($conn,"SELECT * FROM dept_account WHERE email = '$admin_email' AND password = '$admin_pass' AND department = 'LIBRARIAN'");
                $lib_num = mysqli_num_rows($librarian);
    
                if($lib_num >= 1){
                    $_SESSION['email'] = $admin_email;
                    ?>
                        <script>
                            alert("Login Success!");
                            location.href='Librarian';
                        </script>
                    <?php 
                }else{
                    ?>
                         <script>
                            alert("Wrong Email! or Password");
                            location.href='index.php';
                        </script>
                    <?php
                }
            break;
            case 'Students':
                $student_login = mysqli_query($conn,"SELECT * FROM students WHERE email = '$admin_email' AND password = '$admin_pass'");
                $student_num   = mysqli_num_rows($student_login);
        
            
                if($student_num >= 1){
                    $_SESSION['email'] = $admin_email;
                    ?>
                        <script>
                            alert("Login Success!");
                            location.href='students';
                        </script>
                    <?php
                }else{
                    ?>
                    <script>
                        alert("Wrong Email or Password");
                        location.href='index.php';
                    </script>
                <?php
                }
            break;
            case 'Gsd':
                $gsd = mysqli_query($conn,"SELECT * FROM dept_account WHERE email = '$admin_email' AND password = '$admin_pass' AND department = 'GSD'");
                $gsd_num = mysqli_num_rows($gsd);
            
                if($gsd_num >= 1){
                    $_SESSION['email'] = $admin_email;
                ?>
                    <script>
                        alert("Login Success!");
                        location.href='gsd';
                    </script>
                <?php 
                }else{
                    ?>
                    <script>
                        alert("Wrong Email or Password");
                        location.href='index.php';
                    </script>
                <?php
                }
            break;
            case 'Csdl':
                $csdl = mysqli_query($conn,"SELECT * FROM dept_account WHERE email = '$admin_email' AND password = '$admin_pass' AND department = 'CSDL'");
                $csdl_num = mysqli_num_rows($csdl);
            
                if($gsd_num >= 1){
                    $_SESSION['email'] = $admin_email;
                ?>
                    <script>
                        alert("Login Success!");
                        location.href='csdl';
                    </script>
                <?php 
                }else{
                    ?>
                    <script>
                        alert("Wrong Email or Password");
                        location.href='index.php';
                    </script>
                <?php
                }
            break;
            case 'Registrar':
                
                    
        }
        /*
        else{

        $student_login = mysqli_query($conn,"SELECT * FROM students WHERE email = '$admin_email' AND password = '$admin_pass'");
        $student_num   = mysqli_num_rows($student_login);

    
        if($student_num >= 1){
            $_SESSION['email'] = $admin_email;
            ?>
                <script>
                    alert("Login Success!");
                    location.href='students';
                </script>
            <?php
        }else{
            
            $librarian = mysqli_query($conn,"SELECT * FROM dept_account WHERE email = '$admin_email' AND password = '$admin_pass' AND department = 'LIBRARIAN'");
            $lib_num = mysqli_num_rows($librarian);

            if($lib_num >= 1){
                $_SESSION['email'] = $admin_email;
                ?>
                    <script>
                        alert("Login Success!");
                        location.href='Librarian';
                    </script>
                <?php 
            }else{
                $gsd = mysqli_query($conn,"SELECT * FROM dept_account WHERE email = '$admin_email' AND password = '$admin_pass' AND department = 'GSD'");
                $gsd_num = mysqli_num_rows($gsd);
            
                if($gsd_num >= 1){
                    $_SESSION['email'] = $admin_email;
                ?>
                    <script>
                        alert("Login Success!");
                        location.href='gsd';
                    </script>
                <?php 
                }else{
                    $reg = mysqli_query($conn,"SELECT * FROM dept_account WHERE email = '$admin_email' AND password = '$admin_pass' AND deparment = 'REGISTRAR'");
                    $reg_num = mysqli_num_rows($reg);
                
                    if($reg_num >= 1){
                        $_SESSION['email'] = $admin_email;
                    ?>
                        <script>
                            alert("Login Success!");
                            location.href='Registrar';
                        </script>
                    <?php 
                    }
                    
                }
            }
         
        }
     
        
    }
       */
    }
    


//registration 
if(isset($_POST['add_students'])){
    $lastname = $_POST['lastname'];
    $firstname = $_POST['firstname'];
    $id_number = $_POST['id_number'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $department = $_POST['department'];
    $course = $_POST['course'];
    $password = $_POST['password'];
    $year_level = "4th Year";
    $account_status = "New";
    $check_id_number = mysqli_query($conn,"SELECT * FROM students WHERE id_number ='$id_number'");
    $id_num = mysqli_num_rows($check_id_number);

    $check_email = mysqli_query($conn,"SELECT * FROM students WHERE email = '$email'");
    $email_num = mysqli_num_rows($check_email);

    if($id_num >= 1){
        ?>
            <script>
                alert("This ID Number already exist");
                location.href='index.php';
            </script>
        <?php
    }
    if($email_num >= 1){
        ?>
        <script>
            alert("This email already exist!");
            location.href='index.php';
        </script>
    <?php
    }else{
        $register = mysqli_query($conn,"INSERT INTO students VALUE('0','$id_number','$lastname','$firstname','$contact','$email','$password','$course','$department','$year_level','$account_status')");
        if($register == true){
            ?>
                <script>
                    alert("Successfully Registered!");
                    location.href='index.php';
                </script>
            <?php
        }
    }



}
?>