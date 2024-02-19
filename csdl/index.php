<?php include '../conn.php';
session_start();
/*
if (empty($_SESSION)) {
?>
    <script>
        alert("Session Expired");
        location.href = '../index.php';
    </script>
<?php
} else {
    $e = $_SESSION['email'];
    $get_teach = mysqli_query($conn, "SELECT * FROM tbl_accounts WHERE email='$e' AND status='Guidance'");
    while ($teach = mysqli_fetch_object($get_teach)) {
        $lastname =  $teach->lastname;
        $firstname = $teach->firstname;
        $address = $teach->address;
        $email = $teach->email;
        $password = $teach->password;
        $profile = $teach->profile;
        $usertype = $teach->status;
        $id_no = $teach->id_no;
        $phone = $teach->contact;
        $id = $teach->id;
    }
}
*/
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="assets/css/styles.min.css" />
    <!-- bootstrap 5 icons cdn-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">

    <!-- data tables -->
    <link href="https://cdn.datatables.net/v/dt/jq-3.6.0/jszip-2.5.0/dt-1.13.4/af-2.5.3/b-2.3.6/b-colvis-2.3.6/b-html5-2.3.6/b-print-2.3.6/cr-1.6.2/date-1.4.1/fc-4.2.2/fh-3.3.2/kt-2.8.2/r-2.4.1/rg-1.3.1/rr-1.3.3/sc-2.1.1/sb-1.4.2/sp-2.1.2/sl-1.6.2/sr-1.2.2/datatables.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/v/dt/jq-3.6.0/jszip-2.5.0/dt-1.13.4/af-2.5.3/b-2.3.6/b-colvis-2.3.6/b-html5-2.3.6/b-print-2.3.6/cr-1.6.2/date-1.4.1/fc-4.2.2/fh-3.3.2/kt-2.8.2/r-2.4.1/rg-1.3.1/rr-1.3.3/sc-2.1.1/sb-1.4.2/sp-2.1.2/sl-1.6.2/sr-1.2.2/datatables.min.js"></script>
    <!-- Script -->

    <style>
        #calendar {
            max-width: 1100px;
            margin: 0 auto;
            height: 100vh;

        }
    </style>

</head>


<body>
    <title>Librarian</title>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        <?php
        include '../conn.php';
        date_default_timezone_set('Asia/Manila');

        ?>

        <aside class="left-sidebar">
            <!-- Sidebar scroll-->

            <div>
                <div class="brand-logo d-flex align-items-center justify-content-between bg-dark text-light">
                    <a href="index.php" class="text-nowrap logo-img">

                        <h5 class="text-light">CSDL Page</h5>
                    </a>
                    <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                        <i class="ti ti-x fs-8"></i>
                    </div>
                </div>
                <!-- Sidebar navigation-->

                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!--  Sidebar End -->
        <!--  Main wrapper -->
        <div class="body-wrapper">
            <!--  Header Start -->
            <?php include 'inc/header.php'; ?>
            <!--  Header End -->
            <div class="container-fluid">
                <!--  Row 1-->

                <div class="row">
                 
                     
                 
                        <form action="index.php" method="POST">
                        <div class="input-group">
                        <div class="input-group-text"></div>
                        <input type="text" name="id_number" class="form-control" placeholder="ID Number">
                            <button type="submit" names="search" class="btn btn-primary" name="search">Search</button>
                            
                    </div>

                        </form>

                    <?php
                    if (isset($_POST['search'])) {
                        $id_num = $_POST['id_number'];
                  
                        
                        $find = mysqli_query($conn, "SELECT * FROM students WHERE id_number = '$id_num' ");
                        while ($students = mysqli_fetch_object($find)) {
                            $lastname =  $students->lastname;
                            $firstname = $students->firstname;
                            $id_number = $students->id_number;
                        }

                        $find_num = mysqli_num_rows($find);

                        if ($find_num >= 1) {

                    ?>
                            <div class="row">
                                <div class="modal-content">
                                    <div class="modal-header mt-3">
                                        <h3 class="modal-title">Clearance Info</h3>

                                    </div>
                                    <div class="modal-body">

                                        <div class="row">
                                            <?php
                                           
                                            ?>
                                            <div class="col-md-6">
                                                <h5>Name:<?php echo $lastname . ' ' . $firstname; ?></h5>
                                            </div>
                                            <div class="col-md-6">

                                                <h5>ID Number:<?php echo $id_number; ?></h5>
                                            </div>
                                        </div>

                                     
                                            <table class="table mt-3">
                                                <thead class="">
                                                    <tr class="">
                                                        <td style="border-right: 3px solid black;text-align:center;">Department</td>
                                                        <td style="border-right: 3px solid black;text-align:center;">Status</td>
                                                        <td style="text-align:center;">Need to Comply</td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php

                                                    $get_student = mysqli_query($conn, "SELECT * FROM clea WHERE id_number = '$id_number' AND department='CSDL'");
                    
                                                  
                                                    
                                                    while ($student = mysqli_fetch_array($get_student)) {
                                                        $ref_id = $student['id'];

                                                    ?>
                                                        <tr>
                                                            <form action="process.php?id=<?php echo $ref_id; ?>" method="POST">

                                                          
                                                            <td style="border-right: 3px solid black;"><?php echo $student['department']; ?></td>
                                                            <td style="border-right: 3px solid black;"><select name="status" class="form-select" required>
                                                                <option value=""><?php echo $student['status']; ?></option>
                                                                <option value="CLEARED">CLEARED</option>
                                                                <option value="UNCLEARED">UNCLEARED</option>
                                                            </select></td>
                                                            <td><input type="text" style="border:none;" name="comply" class="form-control"></td>

                                                        </tr>
                                                    <?php
                                                    }
                                                    ?>
                                                </tbody>
                                                
                                            </table>
                                            
                                            <div class="d-flex justify-content-end">
                                            <input type="submit" name="save" value="Save" class="btn btn-success">
                                            </div>
                                        </form>
                                              
                                    </div>
                                    <div class="modal-footer">


                                    </div>
                                </div>

                            </div>


                        <?php

                        } else {
                        ?>
                            <div class="alert alert-danger">
                                ID Number Does not Exist!
                            </div>
                    <?php
                        }
                         
                    }
                    
                    ?>
                   
                </div>
            </div>
        </div>
    </div>
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/sidebarmenu.js"></script>
    <script src="assets/js/app.min.js"></script>
    <script src="assets/libs/apexcharts/dist/apexcharts.min.js"></script>
    <script src="assets/libs/simplebar/dist/simplebar.js"></script>
    <script src="assets/js/dashboard.js"></script>
    <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <?php
    if (isset($_SESSION['status']) && $_SESSION['status'] != "") {
        echo $_SESSION['status'];
    ?>
        <script>
            Swal.fire({
                icon: '<?php echo $_SESSION['status_code']; ?>',
                title: '<?php echo $_SESSION['status']; ?>',
                button: 'Ok'
            })
        </script>
    <?php
        unset($_SESSION['status']);
    }
    ?>


    <script>
        //for image upload
        var Loadpp = function() {
            var output = document.getElementById('pp');
            output.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>
    <script>
        function showPass() {
            var x = document.getElementById("pass");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>

</body>

</html>