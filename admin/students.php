<?php include '../conn.php';
session_start();

if (empty($_SESSION)) {
?>
    <script>
        alert("Session Expired");
        location.href = '../index.php';
    </script>
<?php
} else {
    $e = $_SESSION['email'];
    $get_teach = mysqli_query($conn, "SELECT * FROM admin WHERE email='$e'");
    while ($teach = mysqli_fetch_object($get_teach)) {
            $fullname  = $teach->fullname;
        $address = $teach->address;
        $email = $teach->email;
        $password = $teach->password;
        
        $phone = $teach->contact;
        $id = $teach->id;
    }
}
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
    <link href="https://cdn.datatables.net/v/dt/jq-3.6.0/jszip-2.5.0/dt-1.13.4/af-2.5.3/b-2.3.6/b-colvis-2.3.6/b-html5-2.3.6/b-print-2.3.6/cr-1.6.2/date-1.4.1/fc-4.2.2/fh-3.3.2/kt-2.8.2/r-2.4.1/rg-1.3.1/rr-1.3.3/sc-2.1.1/sb-1.4.2/sp-2.1.2/sl-1.6.2/sr-1.2.2/datatables.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/v/dt/jq-3.6.0/jszip-2.5.0/dt-1.13.4/af-2.5.3/b-2.3.6/b-colvis-2.3.6/b-html5-2.3.6/b-print-2.3.6/cr-1.6.2/date-1.4.1/fc-4.2.2/fh-3.3.2/kt-2.8.2/r-2.4.1/rg-1.3.1/rr-1.3.3/sc-2.1.1/sb-1.4.2/sp-2.1.2/sl-1.6.2/sr-1.2.2/datatables.min.js"></script>


    <style>
        #calendar {
            max-width: 1100px;
            margin: 0 auto;
            height: 100vh;

        }
    </style>

</head>


<body>
    <title>List of Students</title>
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

                        <h5 class="text-light">Admin Dashboad</h5>
                    </a>
                    <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                        <i class="ti ti-x fs-8"></i>
                    </div>
                </div>
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
                    <ul id="sidebarnav">
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Home</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="index.php" aria-expanded="false">
                                <span>
                                    <i class="ti ti-layout-dashboard"></i>
                                </span>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">UI COMPONENTS</span>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link" href="students.php" aria-expanded="false">
                                <span>
                                    <i class="ti ti-user"></i>
                                </span>
                                <span class="hide-menu">List of Students</span>
                            </a>
                        </li>


                        <li class="sidebar-item">
                            <a class="sidebar-link" href="new_acc.php" aria-expanded="false">
                                <span>
                                    <i class="ti ti-user"></i>
                                </span>
                                <?php
                                $get_new_num = mysqli_query($conn, "SELECT * FROM students WHERE account_status='New'");

                                ?>
                                <span class="hide-menu">New Accounts <sup class="badge bg-danger"><?php echo mysqli_num_rows($get_new_num); ?></sup></span>
                            </a>
                        </li>


                        <li class="sidebar-item">
                            <a class="sidebar-link" href="dept.php" aria-expanded="false">
                                <span>
                                    <i class="ti ti-user"></i>
                                </span>
                                <span class="hide-menu">Departments Account</span>
                            </a>
                        </li>



                    </ul>

                </nav>
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


                    <div class="card">
                        <div class="card-body">
                            <table class="table table-border " id="accounts">
                                <thead>
                                    <tr>
                                        <td>ID Number</td>
                                        <td>Lastname</td>
                                        <td>Firstname</td>
                                 
                                        <td>Action</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $get_new = mysqli_query($conn, "SELECT * FROM students WHERE account_status = 'Approved'");
                                    while ($new = mysqli_fetch_array($get_new)) {


                                    ?>
                                        <tr>
                                            <td><?php echo $new['id_number']; ?></td>
                                            <td><?php echo $new['lastname']; ?></td>
                                            <td><?php echo $new['firstname']; ?></td>
      
                                            <td><a href="" data-bs-target="#clearance<?php echo $new['id_number']; ?>" data-bs-toggle="modal">View Clearance</a>
                                            <div class="modal" id="clearance<?php echo $new['id_number']; ?>" tabindex="-1">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h3 class="modal-title">Clearance Info</h3>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                            <h5>Name:<?php echo $new['lastname'].' '. $new['firstname']; ?></h5>
                                                            </div>
                                                            <div class="col-md-6">
                                                                
                                                         <h5>ID Number:<?php echo $new['id_number']; ?></h5>
                                                            </div>
                                                        </div>
                                                        
                                                        <form action="process.php" method="POST">
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
                                                                        $id_num = $new['id_number'];
                                                                        $get_student = mysqli_query($conn,"SELECT * FROM clea WHERE id_number = '$id_num' ");
                                                                        while($student = mysqli_fetch_array($get_student))
                                                                        {
                                                                                
                                                                      
                                                                    ?>
                                                                    <tr>
                                                                        <td style="border-right: 3px solid black;"><?php  echo $student['department'];?></td>
                                                                        <td style="border-right: 3px solid black;"><?php  echo $student['status'];?></td>
                                                                        <td><?php  echo $student['completion'];?></td>
                                                                    </tr>
                                                                    <?php 
                                                                      }
                                                                    ?>
                                                                </tbody>
                                                            </table>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                              
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        </td>
                                            
                                        </tr>
                                        
                           

                                       
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <script>
                                let adminsTable = new DataTable('#accounts', {
                                    responsive: true,
                                    lengthMenu: [
                                        [5, 10, 15, -1],
                                        [5, 10, 15, 'All']
                                    ],
                                    scrollX: false,
                                    initComplete: function() {
                                        table.columns.adjust();
                                    },
                                    order: [
                                        [0, 'desc']
                                    ]
                                });
                            </script>
                        </div>
                    </div>

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