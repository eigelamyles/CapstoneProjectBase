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

    <style>
        #calendar {
            max-width: 1100px;
            margin: 0 auto;
            height: 100vh;

        }
    </style>

</head>


<body>
    <title>List of Departments Accounts</title>
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


                <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#add_acc">Create Department Account</button>
                <div class="modal" id="add_acc" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Register Account</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="process.php" method="POST">
                                    <div class="input-group mb-3">
                                        <div class="input-group-text"><i class="bi bi-person"></i></div>
                                        <input type="text" name="firstname" class="form-control" placeholder="Firstname">
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-text"><i class="bi bi-person"></i></div>
                                        <input type="text" name="lastname" class="form-control" placeholder="Lastname">
                                    </div>


                                    <div class="input-group mb-3">
                                        <div class="input-group-text"><i class="bi bi-envelope"></i></div>
                                        <input type="email" name="email" class="form-control" placeholder="Email">
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-text"><i class="bi bi-envelope"></i></div>
                                        <select name="department" class="form-control" required>
                                            <option value="">--Select Department</option>
                                            <option value="LIBRARIAN">LIBRARIAN</option>
                                            <option value="CSDL">CSDL</option>
                                            <option value="GSD">GSD</option>
                                            <option value="REGISTRAR">REGISTRAR</option>
                                            <option value="COLLEGE DEAN">COLLEGE DEAN</option>
                                            <option value="FINANCE">FINANCE</option>
                                        </select>
                                    </div>


             
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="create_dept" class="btn btn-primary">Add</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row">


                    <div class="card">
                        <div class="card-body">
                            <table class="table table-border ">
                                <thead>
                                    <tr>
                                        <td>Email</td>
                                        <td>Lastname</td>
                                        <td>Firstname</td>
                                        <td>Action</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $get_new = mysqli_query($conn, "SELECT * FROM dept_account");
                                    while ($new = mysqli_fetch_array($get_new)) {


                                    ?>
                                        <tr>
                                            <td><?php echo $new['email']; ?></td>
                                            <td><?php echo $new['lastname']; ?></td>
                                            <td><?php echo $new['firstname']; ?></td>
                                            <td><a href="" data-bs-toggle="modal" data-bs-target="#more<?php echo $new['id'] ?>">View More</a></td>
                                        </tr>
                                        <div class="modal" id="more<?php echo $new['id']; ?>" tabindex="-1">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Account Info</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="modal-body">
                                                            <form action="process.php?id=<?php echo $new['id']; ?>" method="POST">
                                                                <div class="input-group mb-3">
                                                                    <div class="input-group-text"><i class="bi bi-person"></i></div>
                                                                    <input type="text" name="firstname" value="<?php  echo $new['firstname'];?>" class="form-control" placeholder="Firstname">
                                                                </div>

                                                                <div class="input-group mb-3">
                                                                    <div class="input-group-text"><i class="bi bi-person"></i></div>
                                                                    <input type="text" name="lastname" value="<?php  echo $new['lastname'];?>" class="form-control" placeholder="Lastname">
                                                                </div>


                                                                <div class="input-group mb-3">
                                                                    <div class="input-group-text"><i class="bi bi-envelope"></i></div>
                                                                    <input type="email" name="email"value="<?php  echo $new['email'];?>"  class="form-control" placeholder="Email">
                                                                </div>

                                                                <div class="input-group mb-3">
                                                                    <div class="input-group-text"><i class="bi bi-envelope"></i></div>
                                                                    <select name="department" class="form-control" required>
                                                                        <option value="<?php  echo $new['department'];?>"><?php  echo $new['department'];?></option>
                                                                        <option value="LIBRARIAN">LIBRARIAN</option>
                                                                        <option value="CSDL">CSDL</option>
                                                                        <option value="GSD">GSD</option>
                                                                        <option value="REGISTRAR">REGISTRAR</option>
                                                                        <option value="COLLEGE DEAN">COLLEGE DEAN</option>
                                                                        <option value="FINANCE">FINANCE</option>
                                                                    </select>
                                                                </div>



                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" name="del_dept" class="btn btn-danger"  onclick="return confirm('Do you want to delete this account?')">Delete</button>
                                                        <button type="submit" name="upd_acc" class="btn btn-primary">Save changes</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
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